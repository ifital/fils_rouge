<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function checkout(Request $request, Reservation $reservation)
    {
        // Vérifier que la réservation appartient à l'utilisateur connecté 
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        // Vérifier que la réservation n'a pas déjà été payée
        $existingPayment = Payment::where('reservation_id', $reservation->id)
            ->where('status', 'paid')
            ->first();

        if ($existingPayment) {
            return redirect()->route('client.reservations.show', $reservation->id)
                ->with('info', 'Cette réservation a déjà été payée.');
        }

        try {
            // Initialiser Stripe avec votre clé secrète
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Créer une session de checkout Stripe
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'mad', // Monnaie marocaine
                            'unit_amount' => $reservation->price * 100, // Montant en centimes
                            'product_data' => [
                                'name' => ($reservation->room->type == 'private' ? 'Chambre privée' : 'Dortoir') . ' #' . $reservation->room->room_number,
                                'description' => 'Séjour du ' . $reservation->check_in->format('d/m/Y') . ' au ' . $reservation->check_out->format('d/m/Y'),
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('client.payment.success', ['reservation' => $reservation->id]),
                'cancel_url' => route('client.payment.cancel', ['reservation' => $reservation->id]),
                'client_reference_id' => $reservation->id,
                'customer_email' => auth()->user()->email,
            ]);

            // Enregistrer la session ID dans la session pour vérification ultérieure
            session(['stripe_session_id' => $session->id]);

            // Rediriger vers la page de paiement Stripe
            return redirect($session->url);

        } catch (ApiErrorException $e) {
            Log::error('Erreur Stripe: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la préparation du paiement. Veuillez réessayer.');
        }
    }

    public function success(Request $request, Reservation $reservation)
    {
        // Vérifier que la session existe
        $sessionId = session('stripe_session_id');
        if (!$sessionId) {
            return redirect()->route('client.reservations.index')
                ->with('error', 'Session de paiement invalide.');
        }

        // Effacer la session
        session()->forget('stripe_session_id');

        try {
            // Initialiser Stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));
            
            // Vérifier la session de paiement
            $session = Session::retrieve($sessionId);
            
            // Vérifier que le paiement est bien pour cette réservation
            if ($session->client_reference_id != $reservation->id) {
                return redirect()->route('client.reservations.index')
                    ->with('error', 'Référence de réservation invalide.');
            }

            // Enregistrer le paiement
            $payment = new Payment();
            $payment->reservation_id = $reservation->id;
            $payment->amount = $reservation->price;
            $payment->payment_method = 'card';
            $payment->status = 'paid';
            $payment->payment_date = now();
            $payment->save();

            return redirect()->route('client.reservations.show', $reservation->id)
                ->with('success', 'Paiement effectué avec succès! Votre réservation est confirmée.');

        } catch (ApiErrorException $e) {
            Log::error('Erreur Stripe lors de la vérification: ' . $e->getMessage());
            return redirect()->route('client.reservations.show', $reservation->id)
                ->with('warning', 'Le paiement a été traité, mais une erreur est survenue lors de la confirmation. Veuillez contacter le support.');
        }
    }

    public function cancel(Request $request, Reservation $reservation)
    {
        // Effacer la session Stripe
        session()->forget('stripe_session_id');

        return redirect()->route('client.reservations.show', $reservation->id)
            ->with('info', 'Le paiement a été annulé. Vous pouvez réessayer ultérieurement.');
    }

    public function webhook(Request $request)
    {
        // Récupérer le contenu de la requête
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            // Vérifier la signature de l'événement
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );

            // Gérer différents types d'événements
            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;
                    $this->handleSuccessfulPayment($session);
                    break;
                case 'payment_intent.payment_failed':
                    $paymentIntent = $event->data->object;
                    $this->handleFailedPayment($paymentIntent);
                    break;
            }

            return response()->json(['status' => 'success']);

        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Webhook error: ' . $e->getMessage()], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }
    }

    private function handleSuccessfulPayment($session)
    {
        $reservationId = $session->client_reference_id;
        
        // Vérifier si le paiement existe déjà
        $paymentExists = Payment::where('reservation_id', $reservationId)
            ->where('status', 'paid')
            ->exists();
            
        if (!$paymentExists) {
            $reservation = Reservation::find($reservationId);
            if ($reservation) {
                // Créer un nouveau paiement
                $payment = new Payment();
                $payment->reservation_id = $reservationId;
                $payment->amount = $reservation->price;
                $payment->payment_method = 'card';
                $payment->status = 'paid';
                $payment->payment_date = now();
                $payment->save();
                
                Log::info('Paiement webhook traité pour la réservation #' . $reservationId);
            } else {
                Log::error('Réservation #' . $reservationId . ' non trouvée pour le webhook Stripe');
            }
        }
    }

    private function handleFailedPayment($paymentIntent)
    {
        // Gérer les paiements échoués si nécessaire
        Log::warning('Paiement échoué: ' . $paymentIntent->id);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Afficher la liste des réservations de l'utilisateur.
     */
    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->id())
            ->with(['room', 'payment'])
            ->orderBy('check_in', 'desc')
            ->paginate(10);
            
        return view('client.my_reservations', compact('reservations'));
    }

    /**
     * Afficher les détails d'une réservation.
     */
    public function show(Reservation $reservation)
    {
        // Vérifier que la réservation appartient à l'utilisateur connecté
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->back()
                ->with('error', 'Vous n\'êtes pas autorisé à voir cette réservation.');
        }

        $payment = Payment::where('reservation_id', $reservation->id)->first();
        
        return view('client.detaills_rooms', compact('reservation', 'payment'));
    }

    /**
     * Enregistrer une nouvelle réservation.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'check_in' => 'required|date|after_or_equal:today',
        'nights' => 'required|integer|min:1|max:30',
        'guests' => 'required|integer|min:1',
    ]);

    // Récupérer la chambre
    $room = Room::findOrFail($validated['room_id']);
    
    // Vérifier le nombre maximum de personnes
    $maxGuests = $room->type == 'private' ? 2 : 8;
    if ($validated['guests'] > $maxGuests) {
        return redirect()->back()->withErrors(['guests' => 'Le nombre de personnes est trop élevé pour ce type de chambre.']);
    }

    // Calculer la date de départ
    $checkIn = Carbon::parse($validated['check_in']);
    $checkOut = (clone $checkIn)->addDays((int) $validated['nights']);

    // Calculer le prix total
    $totalPrice = $room->price * $validated['nights'];

    // Créer la réservation
    $reservation = new Reservation();
    $reservation->user_id = auth()->id();
    $reservation->room_id = $validated['room_id'];
    $reservation->check_in = $checkIn;
    $reservation->check_out = $checkOut;
    $reservation->price = $totalPrice;
    $reservation->status = 'confirmed';
    $reservation->save();

  
    
    // OU Solution 2: Si vous voulez absolument utiliser view(), passez l'objet complet
    $payment = null; // Pas encore de paiement
    return view('client.detaills_reservation', compact('reservation', 'payment'))
       ->with('success', 'Votre réservation a été créée avec succès. Procédez au paiement pour la confirmer.');
}
    /**
     * Annuler une réservation.
     */
    public function cancel(Reservation $reservation)
    {
        // Vérifier que la réservation appartient à l'utilisateur connecté
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->route('client.my_reservations')
                ->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        // Vérifier que la réservation n'a pas déjà été payée
        $payment = Payment::where('reservation_id', $reservation->id)
            ->where('status', 'paid')
            ->first();
            
        if ($payment) {
            return redirect()->route('client.detaills_rooms', ['reservation' => $reservation->id])
                ->with('error', 'Impossible d\'annuler une réservation déjà payée. Veuillez contacter le support.');
        }

        // Annuler la réservation
        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('client.my_reservations')
            ->with('success', 'Votre réservation a été annulée avec succès.');
    }
}
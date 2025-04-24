<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{

    public function allReservations()
    {
        $reservations = Reservation::with(['room', 'payment', 'user'])
            ->orderBy('check_in', 'desc')
            ->paginate(20);

        return view('admin.reservations', compact('reservations'));
    }
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
     * Rediriger vers la liste des réservations (pas de page de détail).
     */
    public function show(Reservation $reservation)
    {
        // Vérifier que la réservation appartient à l'utilisateur connecté
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->back()
                ->with('error', 'Vous n\'êtes pas autorisé à voir cette réservation.');
        }

        return redirect()->route('client.reservations.index');
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

        $room = Room::findOrFail($validated['room_id']);

        // Vérifier la capacité max
        $maxGuests = $room->type === 'private' ? 2 : 8;
        if ($validated['guests'] > $maxGuests) {
            return redirect()->back()->withErrors([
                'guests' => 'Le nombre de personnes est trop élevé pour ce type de chambre.'
            ]);
        }

        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = (clone $checkIn)->addDays((int) $validated['nights']);

        // Vérifier la disponibilité de la chambre
        $alreadyReserved = Reservation::where('room_id', $room->id)
            ->where('status', 'confirmed')
            ->where(function($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut->subDay()])
                    ->orWhereBetween('check_out', [$checkIn->addDay(), $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<=', $checkIn)
                                ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        if ($alreadyReserved) {
            return redirect()->back()->withErrors([
                'room_id' => 'Cette chambre est déjà réservée pour les dates sélectionnées.'
            ]);
        }

        // Calcul du prix total
        $totalPrice = $room->price * $validated['nights'];

        // Création de la réservation
        $reservation = new Reservation();
        $reservation->user_id = auth()->id();
        $reservation->room_id = $validated['room_id'];
        $reservation->check_in = $checkIn;
        $reservation->check_out = $checkOut;
        $reservation->price = $totalPrice;
        $reservation->status = 'confirmed';
        $reservation->save();

        // Aucun paiement effectué pour le moment
        $payment = null;

        return view('client.detaills_reservation', compact('reservation', 'payment'))
            ->with('success', 'Votre réservation a été créée avec succès. Procédez au paiement pour la confirmer.');
    }

    /**
     * Annuler une réservation.
     */
    public function cancel(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->route('client.reservations.index')
                ->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }

        $payment = Payment::where('reservation_id', $reservation->id)
            ->where('status', 'paid')
            ->first();

        if ($payment) {
            return redirect()->route('client.reservations.index')
                ->with('error', 'Impossible d\'annuler une réservation déjà payée. Veuillez contacter le support.');
        }

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('client.reservations.index')
            ->with('success', 'Votre réservation a été annulée avec succès.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     */
    public function index(Request $request)
    {
        $query = Reservation::with(['room', 'payment', 'user'])
            ->orderBy('check_in', 'desc');
        
        // Apply filters if provided
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('from_date') && $request->from_date !== '') {
            $query->where('check_in', '>=', Carbon::parse($request->from_date));
        }
        
        if ($request->has('to_date') && $request->to_date !== '') {
            $query->where('check_in', '<=', Carbon::parse($request->to_date));
        }
        
        $reservations = $query->paginate(10);
        $rooms = Room::all();
        
        return view('employee.reservations', compact('reservations', 'rooms'));
    }

    /**
     * Update the specified reservation.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'nights' => 'required|integer|min:1|max:30',
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|in:confirmed,pending,cancelled',
        ]);

        $room = Room::findOrFail($validated['room_id']);
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = (clone $checkIn)->addDays((int) $validated['nights']);

        // Check if the room is available (excluding this reservation)
        $alreadyReserved = Reservation::where('room_id', $validated['room_id'])
            ->where('status', 'confirmed')
            ->where('id', '!=', $reservation->id)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $checkOutMinusOneDay = (clone $checkOut)->subDay();
                $checkInPlusOneDay = (clone $checkIn)->addDay();
                
                $query->whereBetween('check_in', [$checkIn, $checkOutMinusOneDay])
                    ->orWhereBetween('check_out', [$checkInPlusOneDay, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                          ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        if ($alreadyReserved) {
            return redirect()->back()->withErrors([
                'room_id' => 'The room is already reserved for these dates.'
            ]);
        }

        // Calculate total price
        $totalPrice = $room->price * $validated['nights'];

        // Update reservation
        $reservation->room_id = $validated['room_id'];
        $reservation->check_in = $checkIn;
        $reservation->check_out = $checkOut;
        $reservation->status = $validated['status'];
        $reservation->price = $totalPrice;
        $reservation->save();

        return redirect()->route('employee.reservations.index')
            ->with('success', 'Reservation updated successfully.');
    }

    /**
     * Cancel a reservation.
     */
    public function cancel(Reservation $reservation)
    {
        // Check if payment is completed
        $payment = Payment::where('reservation_id', $reservation->id)
            ->where('status', 'paid')
            ->first();

        if ($payment) {
            return redirect()->route('employee.reservations.index')
                ->with('error', 'Cannot cancel a reservation that has already been paid. Please process a refund first.');
        }

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('employee.reservations.index')
            ->with('success', 'Reservation cancelled successfully.');
    }
}
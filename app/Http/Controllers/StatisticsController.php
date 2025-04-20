<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();
        $daysInMonth = $today->daysInMonth;

        $roomsCount = Room::count();

        // Récupère les réservations confirmées pendant ce mois
        $reservations = Reservation::where('status', 'confirmed')
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('check_in', [$startOfMonth, $endOfMonth])
                      ->orWhereBetween('check_out', [$startOfMonth, $endOfMonth]);
            })
            ->get();

        // Calcule le nombre total de nuits réservées dans le mois
        $reservedNights = 0;

        foreach ($reservations as $reservation) {
            $checkIn = Carbon::parse($reservation->check_in)->greaterThan($startOfMonth) ? $reservation->check_in : $startOfMonth;
            $checkOut = Carbon::parse($reservation->check_out)->lessThan($endOfMonth) ? $reservation->check_out : $endOfMonth;

            $reservedNights += Carbon::parse($checkOut)->diffInDays(Carbon::parse($checkIn));
        }

        $totalAvailableNights = $roomsCount * $daysInMonth;
        $occupancyRate = $totalAvailableNights > 0 ? ($reservedNights / $totalAvailableNights) * 100 : 0;

        // Revenu total
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');

        // Nombre total de réservations confirmées dans le mois
        $totalBookings = $reservations->count();

        return view('admin.dashboard', compact('occupancyRate', 'totalRevenue', 'totalBookings'));
    }
}

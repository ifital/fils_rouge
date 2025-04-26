<?php
namespace App\Services;

use App\Models\ReserveActivitie;

class ReserveActivityService
{

    public function getUserReservations(int $userId)
    {
        return ReserveActivitie::with('activity')
            ->where('user_id', $userId)
            ->latest()
            ->get();
    }
    public function createReservation(array $data): ReserveActivitie
    {
        return ReserveActivitie::create($data);
    }

    public function deleteReservation(int $reservationId, int $userId): bool
    {
        $reservation = ReserveActivitie::where('id', $reservationId)
            ->where('user_id', $userId)
            ->first();

        if ($reservation) {
            return $reservation->delete();
        }

        return false;
    }
}

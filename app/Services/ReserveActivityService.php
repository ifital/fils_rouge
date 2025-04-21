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
}

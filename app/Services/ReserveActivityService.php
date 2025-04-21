<?php
namespace App\Services;

use App\Models\ReserveActivitie;

class ReserveActivityService
{
    public function createReservation(array $data): ReserveActivitie
    {
        return ReserveActivitie::create($data);
    }
}

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

    public function getAllReservations()
    {
        return ReservationActivity::with(['activity', 'user'])
            ->orderBy('reservation_date', 'desc')
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

    public function deleteReservationByManager($reservationId)
    {
        $reservation = ReservationActivity::find($reservationId);
        
        if ($reservation) {
            return $reservation->delete();
        }
        
        return false;
    }
    
    public function updateReservation($reservationId, array $data)
    {
        $reservation = ReservationActivity::find($reservationId);
        
        if ($reservation) {
            if (isset($data['number_of_people']) && $data['number_of_people'] != $reservation->number_of_people) {
                $activity = $reservation->activity;
                $data['price'] = $activity->price * $data['number_of_people'];
            }
            
            return $reservation->update($data);
        }
        
        return false;
    }
}

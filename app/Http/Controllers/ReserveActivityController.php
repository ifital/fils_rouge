<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReserveActivityService;
use App\Models\Activity;

class ReserveActivityController extends Controller
{
    protected $reserveActivityService;

    public function __construct(ReserveActivityService $reserveActivityService)
    {
        $this->reserveActivityService = $reserveActivityService;
    }

    public function index()
{
    $reservations = $this->reserveActivityService
    ->getUserReservations(auth()->id());

    return view('client.my_activities', compact('reservations'));
}


    public function store(Request $request)
    {   
        
        $data = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'number_of_people' => 'required|integer|min:1|max:10',
        ]);

        $data['user_id'] = auth()->id();
        $activity = Activity::findOrFail($data['activity_id']);
        $data['price'] = $activity->price * $data['number_of_people'];

        $this->reserveActivityService->createReservation($data);

        return redirect()->route('client.activities.my.activities');
    }

        public function destroy($reservationId)
    {
        $userId = auth()->id();
        
        $deleted = $this->reserveActivityService->deleteReservation($reservationId, $userId);

        if ($deleted) {
            return redirect()->route('client.activities.my.activities')
            ->with('success', 'Réservation annulée avec succès.');
        }

        return redirect()->route('client.activities.my.activities')
        ->with('error', 'Impossible d\'annuler cette réservation.');
    }
    
        public function managerIndex()
        {
            $reservations = $this->reserveActivityService->getAllReservations();
            return view('employee.reservation_activities', compact('reservations'));
        }

        public function update(Request $request, $id)
        {
            $data = $request->validate([
                'reservation_date' => 'required|date|after_or_equal:today',
                'number_of_people' => 'required|integer|min:1|max:10',
                'status' => 'sometimes|in:confirmed,canceled,pending'
            ]);
            
            $updated = $this->reserveActivityService->updateReservation($id, $data);
            
            if ($updated) {
                return redirect()->route('employee.reservations.activities')
                    ->with('success', 'Réservation mise à jour avec succès.');
            }
            
            return redirect()->route('employee.reservations.activities')
                ->with('error', 'Impossible de mettre à jour cette réservation.');
        }

        // Modifier la méthode destroy pour permettre au manager de supprimer n'importe quelle réservation
        public function managerDestroy($reservationId)
        {
            $deleted = $this->reserveActivityService->deleteReservationByManager($reservationId);
            
            if ($deleted) {
                return redirect()->route('employee.reservations.activities')
                    ->with('success', 'Réservation supprimée avec succès.');
            }
            
            return redirect()->route('employee.reservations.activities')
                ->with('error', 'Impossible de supprimer cette réservation.');
        }

}

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
}

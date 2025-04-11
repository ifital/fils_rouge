<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function ShowActivities()
    {
        return view('client.activities');
    }

    public function index()
    {
        $activities = $this->activityService->getAll();
        return view('admin.activities_dashboard', compact('activities'));
    }

    public function store(StoreActivityRequest $request)
    {
        $this->activityService->store($request);
        return back()->with('success', 'Activité ajoutée.');
    }

    public function destroy(Activity $activity)
    {
        $this->activityService->delete($activity);
        return back()->with('success', 'Activité supprimée.');
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $this->activityService->update($request, $activity);
        return back()->with('success', 'Activité mise à jour avec succès.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Services\ActivityService;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function index()
    {
        return response()->json($this->activityService->getAll());
    }

        public function store(ActivityRequest $request)
    {
        $activity = $this->activityService->store($request->validated());
        return response()->json($activity, 201);
    }

    public function update(ActivityRequest $request, Activity $activity)
    {
        $activity = $this->activityService->update($activity, $request->validated());
        return response()->json($activity);
    }

    public function destroy(Activity $activity)
    {
        $this->activityService->delete($activity);
        return response()->json(['message' => 'Activité supprimée avec succès']);
    }
}

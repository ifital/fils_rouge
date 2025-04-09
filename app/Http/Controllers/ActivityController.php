<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function index()
    {
        $activities = $this->activityService->getAll();
        return view('admin.activities_dashboard', compact('activities'));
    }

    public function store(ActivityRequest $request): RedirectResponse
    {
        $this->activityService->store($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Activité créée avec succès.')
            ->with('activities', $this->activityService->getAll());
    }

    public function update(ActivityRequest $request, Activity $activity): RedirectResponse
    {
        $this->activityService->update($activity, $request->validated());

        return redirect()
            ->back()
            ->with('success', 'Activité mise à jour avec succès.')
            ->with('activities', $this->activityService->getAll());
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $this->activityService->delete($activity);

        return redirect()
            ->back()
            ->with('success', 'Activité supprimée avec succès.')
            ->with('activities', $this->activityService->getAll());
    }
}

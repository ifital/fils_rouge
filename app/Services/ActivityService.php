<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityService
{
    public function getAll()
    {
        return Activity::all();
    }

    public function store(Request $request): void
    {
        $path = $request->file('images')->store('activities', 'public');

        Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'images' => $path,
            'price' => $request->price,
            'status' => $request->status,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    }

    public function update(Request $request, Activity $activity): void
    {
        // Supprimer l’ancienne image si une nouvelle est envoyée
        if ($request->hasFile('images')) {
            if ($activity->images && Storage::disk('public')->exists($activity->images)) {
                Storage::disk('public')->delete($activity->images);
            }

            $path = $request->file('images')->store('activities', 'public');
            $activity->images = $path;
        }

        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->price = $request->price;
        $activity->status = $request->status;
        $activity->start_time = $request->start_time;
        $activity->end_time = $request->end_time;

        $activity->save();
    }

    public function delete(Activity $activity): void
    {
        if ($activity->images && Storage::disk('public')->exists($activity->images)) {
            Storage::disk('public')->delete($activity->images);
        }

        $activity->delete();
    }
}

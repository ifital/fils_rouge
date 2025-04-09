<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService
{
    public function getAll()
    {
        return Activity::all();
    }

    public function store(array $data)
    {
        return Activity::create($data);
    }

    public function update(Activity $activity, array $data)
    {
        $activity->update($data);
        return $activity;
    }

    public function delete(Activity $activity)
    {
        return $activity->delete();
    }
}

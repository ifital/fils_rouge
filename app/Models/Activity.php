<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ReserveActivitie;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'images',
        'price',
        'end_time',
    ];

    public function reserveActivitie() : hasMany
    {
        return $this->hasMany(ReserveActivitie::class);
    }
}

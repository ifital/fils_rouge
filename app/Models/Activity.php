<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'images',
        'price',
        'status',
        'start_time',
        'end_time',
    ];
}

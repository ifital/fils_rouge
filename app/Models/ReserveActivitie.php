<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReserveActivitie extends Model
{
    protected $fillable = [
        'user_id', 'activity_id', 'reservation_date', 'number_of_people', 'price',
    ];
}

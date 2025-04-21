<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReserveActivitie extends Model
{

    protected $table = 'reserve_activitie';
    protected $fillable = [
        'user_id', 'activity_id', 'reservation_date', 'number_of_people', 'price',
    ];

    public function activity()
    {
        return $this->belongsTo(\App\Models\Activity::class);
    }

}

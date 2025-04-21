<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\belongsTo;


class ReserveActivitie extends Model
{

    protected $table = 'reserve_activitie';
    protected $fillable = [
        'user_id', 'activity_id', 'reservation_date', 'number_of_people', 'price',
    ];

    public function activity(): belongsTo
    {
        return $this->belongsTo(Activity::class);
    }

}

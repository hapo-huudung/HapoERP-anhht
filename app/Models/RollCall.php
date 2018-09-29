<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RollCall extends Model
{
    use SoftDeletes;
    const START_TIME = '08:00';
    const END_TIME = '17:30';
    const LATE = 0;
    const ONTIME = 1;
    protected $fillable = [
        'starts_at', 'user_id',
    ];

    protected $dates = [
        'deleted_at',
    ];
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

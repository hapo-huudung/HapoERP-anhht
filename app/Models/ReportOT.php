<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ReportOT extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'starts_at', 'ends_at', 'contents', 'user_id',
    ];

    protected $dates = [
        'deleted_at', 'starts_at', 'ends_at',
    ];

    public function setStartsAtAttribute($data)
    {
        $this->attributes['starts_at'] = Carbon::parse($data)->format('Y-m-d H:i:s');
    }

    public function setEndsAtAttribute($data)
    {
        $this->attributes['ends_at'] = Carbon::parse($data)->format('Y-m-d H:i:s');
    }

    public function getStartsAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i');
    }

    public function getEndsAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

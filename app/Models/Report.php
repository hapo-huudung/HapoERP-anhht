<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'starts_at', 'ends_at', 'today_do', 'tomorrow_do', 'problems', 'user_id',
    ];

    protected $dates = [
        'deleted_at', 'starts_at', 'ends_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

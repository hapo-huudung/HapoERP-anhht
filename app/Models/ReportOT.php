<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportOT extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'starts_at', 'ends_at', 'contents', 'user_id',
    ];

    protected $dates = [
        'deleted_at', 'starts_at', 'ends_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    //
    protected $fillable=[
        'level_id', 'user_id',
    ];

}

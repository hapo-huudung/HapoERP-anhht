<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    const TRUE = 1;
    const FALSE = 0;

    protected $fillable = [
        'user_id', 'department_id', 'create', 'read', 'update', 'delete',
    ];
}

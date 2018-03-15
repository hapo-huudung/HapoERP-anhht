<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    //
    use SoftDeletes;
    const TRUE = 1;
    const FALSE = 0;

    protected $fillable = [
        'user_id', 'department_id', 'create', 'read', 'update', 'delete',
    ];

}

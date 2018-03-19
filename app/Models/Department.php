<?php

namespace App\Models;

use App\Models\DepartmentRole;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    const TRUE = 1;
    const FALSE = 0;

    protected $fillable = [
        'name','create', 'read', 'update', 'delete',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}

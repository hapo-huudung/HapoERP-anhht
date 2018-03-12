<?php

namespace App\Models;

use App\Models\DepartmentRole;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function departmentRole()
    {
        return $this->hasOne(DepartmentRole::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}

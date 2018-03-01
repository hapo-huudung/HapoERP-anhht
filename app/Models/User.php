<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $attributes = [
        'avatar' => 'default.png',
    ];
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'address', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'birthday', 'deleted_at',
    ];

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function reportOTs()
    {
        return $this->hasMany(ReportOT::class);
    }

    public function rollCalls()
    {
        return $this->hasMany(RollCall::class);
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }
}

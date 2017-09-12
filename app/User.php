<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function myTrips()
    {
        return $this->hasMany(Trip::class, 'created_by_id');
    }

    public function otherTrips()
    {
        return $this->belongsToMany(Trip::class);
    }

    public function getTripsAttribute()
    {
        return $this->myTrips->merge($this->otherTrips);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','mentor_type', 'password','user_type', 'mobile', 'country', 'state', 'city', 'domain', 'experience'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * country
     */
    public function countryRelation() {
        return $this->hasOne(country::class, 'country_id', 'country');
    }

    /**
     * state 
     */
    public function stateRelation() {
        return $this->hasOne(state::class, 'state_id', 'state');
    }

    /**
     * city 
     */
    public function cityRelation() {
        return $this->hasOne(city::class, 'city_id', 'city');
    }
}

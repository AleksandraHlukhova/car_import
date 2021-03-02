<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastName', 'phone', 'email', 'password','avatar'
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
     * Get user`s request.
     */
    public function requests()
    {
        return $this->hasMany('App\Request');
    }

    /**
     * Get user`s propositions.
     */
    public function propositions()
    {
        return $this->hasMany('App\Proposition');
    }

    /**
     * Get user`s oders.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function is_admin()
    {
        return $this->role === 0;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'email', 'phone', 'brand', 'price', 'year_from','year_to'
    ];

    /**
     * Get user that owns the requests.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get user`s propositions.
     */
    public function propositions()
    {
        return $this->hasMany('App\Proposition');
    }
}

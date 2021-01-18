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
        'email', 'phone', 'brand', 'price', 'year_from','year_to'
    ];
}

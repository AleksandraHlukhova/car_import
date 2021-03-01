<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id'
    ];

    /**
     * Get user that owns the oders.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get user`s products.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}

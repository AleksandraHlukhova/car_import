<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

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
        return $this->hasMany('App\Product', 'id');
    }

    /**
     * Get cart that own orders
     */
    public function cart()
    {
        return $this->belongsTo('App\Order');
    }
}

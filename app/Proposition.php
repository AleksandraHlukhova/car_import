<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    /**
     * Get user that owns the propositions.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get request that owns the propositions.
     */
    public function request()
    {
        return $this->belongsTo('App\Request');
    }

    /**
     * Get products.
     */
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}

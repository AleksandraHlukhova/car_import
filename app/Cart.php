<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    /**
     * Get oders.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}

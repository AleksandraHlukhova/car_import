<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id'
    ];

    /**
     * get product
     */
    public function product()
    {
        return $this->hasOne('App\Product','id', 'product_id');
    }
}

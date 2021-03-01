<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model', 'year', 'mileage', 'price', 'photo'
    ];

    /**
     * Get proposition that owns the products.
     */
    public function proposition()
    {
        return $this->belongsTo('App\Proposition','product_id');
    }

    /**
     * Get order that owns the products.
     */
    public function order()
    {
        return $this->belongsToMany('App\Order', 'product_id');
    }

    /**
     * Get bookmark that owns the product.
     */
    public function bookmark()
    {
        return $this->belongsTo('App\Bookmark', 'product_id');
    }
}

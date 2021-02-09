<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * show all products in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show()
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    /**
     * show all products in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function update($id)
    {
        $product = Product::find($id);
        // dd($product);

        return view('admin.product-details', ['product' => $product]);
    }

    /**
     * show all products in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function delete(Request $request)
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }
}

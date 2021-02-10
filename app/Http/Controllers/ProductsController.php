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
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->isMethod('post')) 
        {
            // dd($request['engine_type']);
            Product::where('id', $id)
            ->update([
            "brand" => $request['brand'],
            "model" => $request['model'],
            "engine_type" => $request['engine_type'],
            "transmission" => $request['transmission'],
            "mileage" => $request['mileage'],
            "price" => $request['price'],
          ]);

            $products = Product::all();
            return view('admin.products', ['products' => $products]);
        }
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

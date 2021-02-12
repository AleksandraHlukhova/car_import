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
     *create new product in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function create(Request $request)
    {
        // $product = Product::find($id);
        $engine_types = config('car_import.engine_type');
        $transmission = config('car_import.transmission');

        if ($request->isMethod('post')) 
        {

            $file = $request->photo;
            $path = $request->photo->path();
            dd($path);

            Product::create([
            "brand" => $request['brand'],
            "model" => $request['model'],
            "year" => $request['year'],
            "engine_type" => $request['engine_type'],
            "transmission" => $request['transmission'],
            "mileage" => $request['mileage'],
            "price" => $request['price'],
            "photo" => $request['photo']
          ]);

            $products = Product::all();
            return view('admin.products', [
                'products' => $products,
                'engine_types' => $engine_types,
                'transmission' => $transmission
            ]);
        }
        return view('admin.product-create', [
            'engine_types' => $engine_types,
            'transmission' => $transmission
        ]);
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
        $engine_types = config('car_import.engine_type');
        $transmission = config('car_import.transmission');

        if ($request->isMethod('post')) 
        {
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
            return view('admin.products', [
                'products' => $products,
                'engine_types' => $engine_types,
                'transmission' => $transmission
            ]);
        }
        return view('admin.product-update', [
            'product' => $product,
            'engine_types' => $engine_types,
            'transmission' => $transmission
        ]);
    }

    /**
     * show all products in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function delete(Request $request, $id)
    {
        Product::find($id)->delete();

        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }
}

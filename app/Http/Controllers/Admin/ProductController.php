<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
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
        $engine_types = config('car_import.engine_type');
        $transmission = config('car_import.transmission');
        
        if ($request->isMethod('post')) 
        {
            $path = $request->file('photo')->store('images');
            // dd($path, $store);
            Product::create([
            "brand" => $request['brand'],
            "model" => $request['model'],
            "year" => $request['year'],
            "engine_type" => $request['engine_type'],
            "transmission" => $request['transmission'],
            "mileage" => $request['mileage'],
            "price" => $request['price'],
            "photo" => $path
          ]);

            return redirect()->route('admin.products.show');
        }
        return view('admin.product-create', [
            'engine_types' => $engine_types,
            'transmission' => $transmission
        ]);
    }

    /**
     * update product in admin
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
            if(!$request->hasFile('photo') && !$product->photo)
            {
                return back()->with(
                    'error', config('car_import.errors')[0]
                );
            }
            if($request->hasFile('photo'))
            {
                $path = $request->file('photo')->store('images');

            }

            Product::where('id', $id)
            ->update([
            "brand" => $request['brand'],
            "model" => $request['model'],
            "engine_type" => $request['engine_type'],
            "transmission" => $request['transmission'],
            "mileage" => $request['mileage'],
            "price" => $request['price'],
            "photo" => isset($path) ?  $path : $product->photo
          ]);

            return redirect()->route('admin.products.show');
        }
        return view('admin.product-update', [
            'product' => $product,
            'engine_types' => $engine_types,
            'transmission' => $transmission
        ]);
    }

    /**
     * delete product in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function delete(Request $request, $id)
    {
        Product::find($id)->delete();

        return redirect()->route('admin.products.show');
    }

    /**
     * product photo delete
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function photoDelete($id)
    {
        $product = Product::find($id);
        $product->photo = '';
        $product->save();
        return redirect()->route('admin.product.update', ['id' => $id]);
    }
}

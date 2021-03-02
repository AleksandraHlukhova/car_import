<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\StoreProduct;

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
     *show product form in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function createForm(Request $request)
    {
        $engine_types = config('car_import.engine_type');
        $transmission = config('car_import.transmission');
        return view('admin.product-create', [
            'engine_types' => $engine_types,
            'transmission' => $transmission
        ]);
    }

    /**
     *create new product in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function create(StoreProduct $request)
    {
        $params = $request->all();
        $path = $request->file('photo')->store('images');
        $params['photo'] = $path;

        Product::create($params);

        return redirect()->route('admin.products.show');
    }

    /**
     *show update product form in admin
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function updateForm(Request $request, $id)
    {
        $product = Product::find($id);
        $engine_types = config('car_import.engine_type');
        $transmission = config('car_import.transmission');
        return view('admin.product-update', [
            'product' => $product,
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
    public function update(StoreProduct $request, $id)
    {
        $params = request()->except(['_token']);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images');
            $params['photo'] = $path;
        }
        Product::where('id', $id)
            ->update($params);

        return redirect()->route('admin.products.show');
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

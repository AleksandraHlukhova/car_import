<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{

    /**
     * cart init
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public static function cartInit(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $request->session()->put("cart", []);
        }
    }
    /**
     * add to cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function add(Request $request, $id)
    {

        $cart = $request->session()->get('cart');

        if(array_key_exists($id, $cart))
        {
            $request->session()->put("cart", []);
        }
        else
        {
            $request->session()->put("cart", [$id => 1]);
        }
        return redirect()->route('index');
    }

    /**
     * show cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show(Request $request)
    {
        $products = [];
        // dd($cart, $products);
        $cart = $request->session()->get('cart');
dd($cart);
        if (count($cart) === 0) 
        {
            return view('cart', ['products' => $products]);
        }
        else{
            $products = Product::all();

        }
        dd($cart, $products);
        // return redirect()->route('index');
    }


}

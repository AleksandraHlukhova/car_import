<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * add to cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function add(Request $request, $id)
    {

        if (!$request->session()->has('cart')) {
            $request->session()->put("cart", []);
        }
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

        if (!$request->session()->has('cart')) 
        {
            return view('cart');
        }
        else{
            $cart = $request->session()->get('cart');

        }
        dd($cart);
        // return redirect()->route('index');
    }
}

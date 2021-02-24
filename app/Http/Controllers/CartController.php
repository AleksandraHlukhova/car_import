<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;

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
        $orderId = \session('orderId');
        if(is_null($orderId))
        {
            $order = Order::create([
                'user_id' => Auth::id()
            ]);
            session(['orderId' => $order->id]);
        }
        else
        {
            $order = Order::find($orderId);
        }
        $order->products()->attach($id);
        return redirect()->back();
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
        $orderId = \session('orderId');
        if(is_null($orderId))
        {
            return view('cart', ['oder' => $order]);
        }
        $order = Order::find($orderId);
        return view('cart', ['order' => $order]);
    }


}

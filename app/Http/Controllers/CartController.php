<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Http\Controllers\Helpers\FlashMessage;

class CartController extends Controller
{

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
            return view('cart');
        }
        $order = Order::find($orderId);
        return view('cart', ['order' => $order]);
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
            if(Auth::check())
            {
                $order = Order::create([
                'user_id' => Auth::id()
                ]);
                session(['orderId' => $order->id]);
            }
            else{
                FlashMessage::flashNotification('Please, sign in or sign up!!');
                return redirect()->back();
            }
        }
        else
        {
            $order = Order::find($orderId);
        }
        $order->products()->attach($id);
        return redirect()->back();
    }

    /**
     * delete product from cart
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function productDelete($id)
    {
        $orderId = \session('orderId');
        $order = Order::find($orderId);
        $order->products()->detach($id);
        return view('cart', ['order' => $order]);

    }

}

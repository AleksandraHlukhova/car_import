<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{

    /**
     * show orders and their status
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show()
    {
        $orders = Order::all();
        return view('admin.orders', ['orders' => $orders]);
    }

    /**
     * change orders paid and readiness status
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function edit(Request $request, $id)
    {
        if($request->paid_status)
        {
            Order::where('id', $id)->update(['paid_status' => $request->paid_status]);
        }
        if($request->readiness_status)
        {
            Order::where('id', $id)->update(['readiness_status' => $request->readiness_status]);
        }
        return redirect()->route('admin.orders.show');
    }
}

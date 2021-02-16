<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;

class AdminController extends Controller
{
    /**
     * show admin page
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return view('admin.admin');
    }

    /**
     * show customers list
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function customers()
    {
        $customers = User::all();
        return view('admin.customers', ['customers' => $customers]);
    }

    /**
     * show orders and their status
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function orders()
    {
        $orders = Order::all();
        // dd($orders);
        return view('admin.orders', ['orders' => $orders]);
    }
}

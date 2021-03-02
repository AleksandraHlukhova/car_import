<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
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
}

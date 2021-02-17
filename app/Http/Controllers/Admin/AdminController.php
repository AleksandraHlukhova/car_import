<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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

}

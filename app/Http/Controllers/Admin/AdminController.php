<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * show admin home page
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
     * logout
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

}

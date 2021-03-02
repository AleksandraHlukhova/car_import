<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class ProfileController extends Controller
{
    /**
     * show profile page
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return view('profile');
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

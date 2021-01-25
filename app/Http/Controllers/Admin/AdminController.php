<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

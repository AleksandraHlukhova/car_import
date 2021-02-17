<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request as Req;

class RequestController extends Controller
{
    /**
     * show requests
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show()
    {
        $requests = Req::get();
        return view('admin.requests', ['requests' => $requests]);
    }
}

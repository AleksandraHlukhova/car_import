<?php

namespace App\Http\Controllers;

use App\Proposition;
use Illuminate\Http\Request;
use App\Request as Req;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helpers\FlashMessage;

class RequestController extends Controller
{

    /**
     * show requests in profile
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show()
    {
        $requests = Req::where('user_id', Auth::id())->get();
        return view('requests', ['requests' => $requests]);
    }

    /**
     *  show request form and processing
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function request(Request $request)
    {
        if($request->isMethod('post'))
        {
            Req::create([
                'user_id' => Auth::id(),
                'email' => $request->email,
                'phone' => $request->phone,
                'brand' => $request->brand,
                'price' =>$request->price,
                'year_from' => $request->year_from,
                'year_to' => $request->year_to

            ]);

            FlashMessage::flashNotification('Your request was sent =)');
            return view('request-form');
        }
        return view('request-form');


        
    }

}

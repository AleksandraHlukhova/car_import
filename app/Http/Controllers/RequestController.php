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
     * show request form
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return view('request-form');
    }

    /**
     * show request form
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
     *  form
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

    /**
     *  change status
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function requestChangeStatus(Request $request, $id)
    {
        $proposition = Proposition::find($id);
        $proposition->status = $request->status;
        $proposition->save();

        return redirect()->route('proposition.show');
    }
}

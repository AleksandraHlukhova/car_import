<?php

namespace App\Http\Controllers;

use App\Proposition;
use Illuminate\Http\Request;
use App\Request as Req;
use Illuminate\Support\Facades\Auth;

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
        return view('request');
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
        }

        return redirect()->route('index');
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Proposition;
use Illuminate\Support\Facades\Auth;

class PropositionController extends Controller
{
    /**
     * show propositions
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show()
    {
        $propositions = Proposition::where('id', Auth::id())->get();
        $products = [];
        foreach($propositions as $proposition)
        {
            $products[] = $proposition->product;
        }

        return view('profile', ['products' => $products]);
    }
}

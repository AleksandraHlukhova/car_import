<?php

namespace App\Http\Controllers;

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
        $propositions = Proposition::find(Auth::id())->products;
        return view('profile', ['products' => $propositions]);
    }
}

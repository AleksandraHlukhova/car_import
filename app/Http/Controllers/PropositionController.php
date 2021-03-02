<?php

namespace App\Http\Controllers;

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
        $propositions = Proposition::where('user_id', Auth::id())->get();
        $statuses = config('car_import.proposition_status');

        return view('propositions', [
            'propositions' => $propositions,
            'statuses' => $statuses
        ]);
    }

    /**
     *  change status
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function propositionChangeStatus(Request $request, $id)
    {
        $proposition = Proposition::find($id);
        $proposition->status = $request->status;
        $proposition->save();

        return redirect()->route('proposition.show');
    }
}

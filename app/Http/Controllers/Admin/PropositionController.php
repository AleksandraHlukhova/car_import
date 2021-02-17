<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Proposition;
use App\Product;
use App\Request as Req;
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

        /**
     * propositions selct
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function select($id)
    {
        $products = Product::all();
        return view('admin.products-select', [
            'products' => $products,
            'id' => $id
        ]);
    }

    /**
     * propositions add
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function add(Request $request, $id)
    {
        // dd($request->id);
        $propositions_id = $request->id;
        $request = Req::find($id);
        foreach($propositions_id as $id)
        {
            Proposition::create([
                'user_id' => $request->user_id,
                'product_id' => $id,
                'status' => 'pending'
            ]);
        }
        
        return redirect()->route('admin.requests.show');
    }
}

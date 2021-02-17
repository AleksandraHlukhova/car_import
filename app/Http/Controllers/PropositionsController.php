<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Request as Req;
use App\Proposition;

class PropositionsController extends Controller
{
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * show home page
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        $products = Product::get();
        return view('user-home', ['products' => $products]);
    }

    /**
     * show product page
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function product($id)
    {
        $product = Product::find($id);
        return view('product-details', ['product' => $product]);
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Bookmark;

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
    public function index(Request $request)
    {
        $products = Product::get();
        $bookmarks = Bookmark::get();
        foreach($products as &$product)
        {
            foreach($bookmarks as $bookmark)
            {
                if($product->id === $bookmark->product_id && $bookmark->user_id === Auth::id())
                {
                    $product->bookmarks = $bookmark;
                }
            }
        }

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

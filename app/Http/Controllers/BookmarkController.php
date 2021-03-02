<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Bookmark;
class BookmarkController extends Controller
{

    /**
     * show bookmarks
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        $products = [];
        foreach($bookmarks as $bookmark)
        {
            $products[] = $bookmark->product;
        }

        return view('profile', ['products' => $products]);
    }

    /**
     * add bookmarks
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function add(Request $request)
    {
        $id = $request['id'];

        $bookmarkIsset = Bookmark::where([
            ['user_id', Auth::id()], 
            ['product_id', $id]
        ])->get();

        if(!count($bookmarkIsset) > 0)
        {
            DB::table('bookmarks')->insert(
                ['user_id' => Auth::id(),
                 'product_id' => $id,
                 'status' => 1,
                ]
            );
        }   

        if(count($bookmarkIsset) > 0)
        {
            DB::table('bookmarks')->where(
                ['user_id' => Auth::id(),
                 'product_id' => $id
                ]
            )->delete();
        }  

        return back(); 
        
    }

}

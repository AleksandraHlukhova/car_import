<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlashMessage extends Controller
{
    /**Show flash msg
     **/
    public static function flashNotification($msg)
    {
        \Session::flash('flash-notification', $msg);
    }
}

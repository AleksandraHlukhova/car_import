<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helpers\FlashMessage;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(!Auth::user()->isAdmin())
            {
            FlashMessage::flashNotification('You have not rights');
            return redirect()->route('index');
            }
            return $next($request);
        }
        FlashMessage::flashNotification('Please sign in or sign up!!!');
        return redirect()->route('index');
        
    }
}
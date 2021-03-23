<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (!$request->expectsJson()) {
        //     return route('login');
        // }

        if (Auth::guard('officer')->check()) {
            // return redirect('/admin');
            dd('Welcome Officer!');
        } else if (Auth::guard('web')->check()) {
            // return redirect('/user');
            dd('Welcome User!');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use App\User;

class Authenticate
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
        $user = User::findOrCreateFromCAS();

        if (Auth::guest() || Auth::user()->uid != $user->uid) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                Auth::login($user);
                return Redirect::intended('/');
            }
        }

        return $next($request);
    }
}

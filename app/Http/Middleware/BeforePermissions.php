<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Route;
use Auth;

class BeforePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $route = app()->router->getCurrentRoute();

        $meeting = $route->parameters('meeting');
        if($meeting['meeting']->user_id !== Auth::id()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return abort(403);
            }
        }

        return $next($request);
    }
}

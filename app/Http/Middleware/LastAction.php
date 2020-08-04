<?php

namespace App\Http\Middleware;

use DB;
use Closure;
class LastAction
{
    public function handle($request, Closure $next)
    {
        if (\Auth::check()) {
            // The user is logged in...
            $user = \Auth::user();
            $user->last_action = date('Y-m-d H:i:s');
            $user->save();
        }
        return $next($request);
    }
}

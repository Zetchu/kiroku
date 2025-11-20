<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // check if user is logged and if its admin
        if ($user && $user->is_admin) {
            return $next($request);
        }
        // if not throw 403
        abort(403, 'You do not have access to the Admin panel.');
    }
}
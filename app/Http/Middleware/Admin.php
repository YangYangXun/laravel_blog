<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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

        // check if user login
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return $next($request);
            }

        }

        return redirect()->route('index');

    }
}

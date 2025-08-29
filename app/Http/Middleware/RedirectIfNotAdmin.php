<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check admin guard is NOT logged in
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.admin_login');
        }

        // If logged in, allow the request to proceed
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AuthMiddleware
{
   public function handle($request, Closure $next)
    {
        // Check session key
     if (!session()->has('admin_logged_in') && !session()->has('employee_logged_in')) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }
        return $next($request);
    }
}

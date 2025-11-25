<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('user_id')) {
            return redirect('/');
        }

        return $next($request);
    }
}

<?php
// Middleware: EnsureUserIsAdmin — restrict route access to admin users only
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    // Handle request: check if user exists and has admin status
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated (has user_id in session)
        $userId = $request->session()->get('user_id');
        if (!$userId) {
            return redirect()->route('login');
        }

        // Get the user from Registration model
        $user = \App\Models\Registration::find($userId);
        if (!$user) {
            $request->session()->forget('user_id');
            return redirect()->route('login');
        }

        // Check if user has admin status (is_admin = 1)
        if (!($user->is_admin ?? false)) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}

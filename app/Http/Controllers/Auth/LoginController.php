<?php
/**
 * Controller: LoginController
 * Purpose: Handles showing the login form, authenticating users using the
 * lightweight `Registration` model, and logging out (clearing session).
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class LoginController extends Controller
{
    /** 
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle a login POST.
     *
     * Validates credentials against the `registrations` table and, on success,
     * stores `user_id` in session. On failure, redirects back with a status
     * message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Registration::where('email', $data['email'])->first();
        if (! $user || ! password_verify($data['password'], $user->password)) {
            return back()->with('status', 'Invalid credentials.');
        }

        $request->session()->put('user_id', $user->id);
        return redirect('/');
    }

    /**
     * Log the user out by removing the session key.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect('/login');
    }
}

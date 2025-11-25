<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

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

    public function destroy(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect('/login');
    }
}

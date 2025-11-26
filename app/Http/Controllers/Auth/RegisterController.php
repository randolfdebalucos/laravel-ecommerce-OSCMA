<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:registrations,username',
            'email' => 'required|email|unique:registrations,email',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|confirmed|min:6',
        ]);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $user = Registration::create($data);

        return redirect('/login')->with('status', 'Registration successful.');
    }
}

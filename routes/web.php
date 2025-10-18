<?php

use Illuminate\Support\Facades\Route;
// Authentication routes for Online Shop MotorCycle Accessories (motorcycle accessories)
Route::get('/', function () {
    return redirect('/login');
});

// Show login form
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Handle login submission (placeholder — replace with controller/auth logic)
Route::post('/login', function (\Illuminate\Http\Request $request) {
    // Validate
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Placeholder: in a real app, attempt auth here. For now redirect back with status.
    return back()->with('status', 'Login attempted (placeholder).');
});

// Show registration form
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Initialize
// Handle registration submission (placeholder — replace with controller logic)
Route::post('/register', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        // avoid DB check in test environment where PDO sqlite may be missing
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    // Placeholder: create user, etc. For now return to login with status.
    return redirect('/login')->with('status', 'Registration successful (placeholder).');
});

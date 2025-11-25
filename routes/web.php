<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});
// Authentication routes (controller-backed)
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

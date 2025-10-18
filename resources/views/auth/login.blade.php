@extends('layouts.app')

@section('title', 'Login — Online Shop MotorCycle Accessories')

@section('content')
<div class="max-w-md mx-auto mt-12 p-6 bg-white shadow-sm rounded">
    <h1 class="text-2xl font-semibold mb-2">Sign in to Online Shop MotorCycle Accessories</h1>
    <p class="text-sm text-gray-600 mb-4">Access your account to buy helmets, parts and accessories for your motorcycle.</p>

    @if(session('status'))
        <div class="mb-4 text-sm text-green-700">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between mb-4">
            <label class="flex items-center text-sm">
                <input type="checkbox" name="remember" class="mr-2" /> Remember me
            </label>
            <a href="#" class="text-sm text-blue-600">Forgot password?</a>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-gray-900 text-white rounded">Sign in</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">New to Online Shop MotorCycle Accessories? <a href="{{ url('/register') }}" class="text-blue-600">Create an account</a></p>
</div>
@endsection

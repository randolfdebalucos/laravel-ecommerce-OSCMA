@extends('layouts.app')

@section('title', 'Register — Online Shop MotorCycle Accessories')

@section('content')
<div class="max-w-lg mx-auto mt-12 p-6 bg-white shadow-sm rounded">
    <h1 class="text-2xl font-semibold mb-2">Create your Online Shop MotorCycle Accessories account</h1>
    <p class="text-sm text-gray-600 mb-4">Register to order motorcycle helmets, parts, apparel and accessories.</p>

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('username') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            </div>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-gray-900 text-white rounded">Create account</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <a href="{{ url('/login') }}" class="text-blue-600">Sign in</a></p>
</div>
@endsection

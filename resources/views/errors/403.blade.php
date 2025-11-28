@extends('layouts.app')

@section('title', '403 — Access Denied')

@section('content')
<div class="max-w-md mx-auto mt-12 p-6 bg-white shadow-sm rounded text-center">
    <h1 class="text-4xl font-bold text-red-600 mb-4">403</h1>
    <h2 class="text-2xl font-semibold mb-2">Access Denied</h2>
    <p class="text-gray-600 mb-6">You do not have permission to access this resource. Admin privileges are required.</p>
    <div class="flex gap-4 justify-center">
        <a href="{{ url('/') }}" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-gray-800">Go Home</a>
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</a>
    </div>
</div>
@endsection

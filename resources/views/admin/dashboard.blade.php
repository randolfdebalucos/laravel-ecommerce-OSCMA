@extends('layouts.app')

@section('title', 'Admin Dashboard — Online Shop MotorCycle Accessories')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Total Users</h3>
            <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Registration::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Admins</h3>
            <p class="text-3xl font-bold text-red-600">{{ \App\Models\Registration::where('is_admin', true)->count() }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Regular Users</h3>
            <p class="text-3xl font-bold text-green-600">{{ \App\Models\Registration::where('is_admin', false)->count() }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Admin Menu</h2>
        <ul class="space-y-2">
            <li><a href="{{ route('admin.users') }}" class="text-blue-600 hover:underline">Manage Users</a></li>
            <li><a href="{{ route('admin.settings') }}" class="text-blue-600 hover:underline">Settings</a></li>
            <li><a href="{{ route('logout') }}" class="text-red-600 hover:underline">Logout</a></li>
        </ul>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Admin Settings — Online Shop MotorCycle Accessories')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Admin Settings</h1>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-2xl font-semibold mb-4">System Settings</h2>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Site Name</label>
                <input type="text" value="Online Shop MotorCycle Accessories" class="w-full px-3 py-2 border border-gray-300 rounded" disabled>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Support</label>
                <input type="email" placeholder="support@example.com" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Max Users</label>
                <input type="number" placeholder="Unlimited" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
        </div>
        <button class="mt-4 px-4 py-2 bg-gray-900 text-white rounded hover:bg-gray-800">Save Settings</button>
    </div>

    <div class="space-y-4">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Back to Dashboard</a>
    </div>
</div>
@endsection

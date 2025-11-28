@extends('layouts.app')

@section('title', 'Manage Users — Admin — Online Shop MotorCycle Accessories')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Manage Users</h1>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Admin</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Registration::all() as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm">{{ $user->id }}</td>
                    <td class="px-6 py-3 text-sm">{{ $user->name }}</td>
                    <td class="px-6 py-3 text-sm">{{ $user->email }}</td>
                    <td class="px-6 py-3 text-sm">
                        @if($user->is_admin)
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold">Admin</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">User</span>
                        @endif
                    </td>
                    <td class="px-6 py-3 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Back to Dashboard</a>
    </div>
</div>
@endsection

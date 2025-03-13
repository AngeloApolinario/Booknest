@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800">📊 Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-6 mt-6">
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Books</h2>
            <p class="text-2xl">{{ $totalBooks }}</p>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Borrows</h2>
            <p class="text-2xl">{{ $totalBorrows }}</p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Admins</h2>
            <p class="text-2xl">{{ $totalAdmins }}</p>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mt-8">
        <form method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by book title or user name..."
                class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                🔍 Search
            </button>
        </form>
    </div>

    <h2 class="mt-8 text-xl font-semibold">Recent Borrows</h2>
    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Book</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Borrowed On</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentBorrows as $borrow)
            <tr class="border">
                <td class="border px-4 py-2">{{ $borrow->book->title }}</td>
                <td class="border px-4 py-2">{{ $borrow->user->name }}</td>
                <td class="border px-4 py-2">{{ $borrow->created_at->format('M d, Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4 text-gray-500">No borrows found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
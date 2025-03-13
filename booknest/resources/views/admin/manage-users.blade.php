@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800">👥 Manage Users</h1>

    <div class="mt-4">
        <form method="GET" action="{{ route('admin.manage-users') }}" class="mb-4">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search users..."
                class="border p-2 rounded w-1/3" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                Search
            </button>
        </form>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow mt-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 border">
                        <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                        <form action="#" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-2 border text-center text-gray-500">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800">📚 Borrowed Books</h1>

    <div class="mt-4">
        <form method="GET" action="{{ route('admin.books-borrow') }}" class="mb-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by book title or user..."
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
                    <th class="px-4 py-2 border">Book Title</th>
                    <th class="px-4 py-2 border">Author</th>
                    <th class="px-4 py-2 border">Borrowed By</th>
                    <th class="px-4 py-2 border">Borrowed On</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrowedBooks as $borrow)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $borrow->book->title }}</td>
                    <td class="px-4 py-2 border">{{ $borrow->book->author }}</td>
                    <td class="px-4 py-2 border">{{ $borrow->user->name }}</td>
                    <td class="px-4 py-2 border">{{ $borrow->created_at->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 border text-center text-gray-500">No borrowed books found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
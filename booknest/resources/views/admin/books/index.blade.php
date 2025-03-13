@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📚 Manage Books</h1>
        <a href="{{ route('admin.books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
            + Add New Book
        </a>
    </div>

    {{-- Search Form --}}
    <form method="GET" action="{{ route('admin.books.index') }}" class="mb-4">
        <div class="flex space-x-2">
            <input type="text" name="search" placeholder="Search by Title, Author, ISBN..."
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                🔍 Search
            </button>
        </div>
    </form>

    @if(session('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Books Table --}}
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 border">📖 Title</th>
                    <th class="px-4 py-2 border">✍️ Author</th>
                    <th class="px-4 py-2 border">🔢 ISBN</th>
                    <th class="px-4 py-2 border">📦 Copies Available</th>
                    <th class="px-4 py-2 border">⚙️ Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $book->title }}</td>
                    <td class="px-4 py-2 border">{{ $book->author }}</td>
                    <td class="px-4 py-2 border">{{ $book->isbn }}</td>
                    <td class="px-4 py-2 border">{{ $book->copies_available }}</td>
                    <td class="px-4 py-2 border flex space-x-2">
                        <a href="{{ route('admin.books.edit', $book) }}" class="text-blue-600 hover:underline">
                            ✏️ Edit
                        </a>
                        <form method="POST" action="{{ route('admin.books.destroy', $book) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this book?');">
                                🗑️ Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($books->isEmpty())
    <p class="text-gray-500 mt-4">No books found.</p>
    @endif
</div>
@endsection
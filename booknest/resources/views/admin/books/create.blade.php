@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-4 flex items-center">
        📖 Add a New Book
    </h1>
    <p class="text-gray-600 mb-4">
        Fill out the details below to add a new book to the library collection.
    </p>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>⚠ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.books.store') }}">
        @csrf

        <!-- Book Title -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium" for="title">📘 Title</label>
            <input type="text" name="title" id="title" class="w-full p-2 border rounded-lg" placeholder="Enter book title" required>
        </div>

        <!-- Author -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium" for="author">✍️ Author</label>
            <input type="text" name="author" id="author" class="w-full p-2 border rounded-lg" placeholder="Enter author's name" required>
        </div>

        <!-- ISBN -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium" for="isbn">📑 ISBN</label>
            <input type="text" name="isbn" id="isbn" class="w-full p-2 border rounded-lg" placeholder="Enter ISBN number" required>
        </div>

        <!-- Copies Available -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium" for="copies_available">📦 Copies Available</label>
            <input type="number" name="copies_available" id="copies_available" class="w-full p-2 border rounded-lg" min="1" placeholder="Number of copies available" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 flex items-center">
            ➕ Add Book
        </button>
    </form>
</div>
@endsection
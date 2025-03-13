@extends('admin.layout')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">✏️ Edit Book</h2>
    <form method="POST" action="{{ route('admin.books.update', $book) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ $book->title }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Author</label>
            <input type="text" name="author" class="w-full border p-2 rounded" value="{{ $book->author }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ $book->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Cover Image</label>
            <input type="file" name="cover_image" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
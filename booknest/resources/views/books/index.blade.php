<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Available Books</h3>


                <form method="GET" action="{{ route('books.index') }}" class="mb-4 flex">
                    <input type="text" name="search" placeholder="Search books..."
                        value="{{ request('search') }}"
                        class="border border-gray-300 px-4 py-2 w-full rounded-l-md focus:ring focus:ring-blue-300">
                    <button type="submit" class="bg-blue-500 text-white px-8 py-2 rounded-r-md">
                        🔍 Search
                    </button>
                </form>


                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Title</th>
                            <th class="border border-gray-300 px-4 py-2">Author</th>
                            <th class="border border-gray-300 px-4 py-2">ISBN</th>
                            <th class="border border-gray-300 px-4 py-2">Available Copies</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2">{{ $book->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $book->author }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $book->isbn }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $book->copies_available }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($book->copies_available > 0)
                                <form action="{{ route('borrow.book', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Borrow
                                    </button>
                                </form>
                                @else
                                <span class="text-red-500">Not Available</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-4">No books found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
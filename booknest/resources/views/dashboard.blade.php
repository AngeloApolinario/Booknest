<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('BookNest Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Welcome to BookNest 📚</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Discover, organize, and manage your personal library effortlessly.
                </p>
            </div>

            <!-- Statistics Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Total Books</h4>
                    <p class="text-3xl font-bold text-blue-500 mt-2">1,245</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Categories</h4>
                    <p class="text-3xl font-bold text-green-500 mt-2">34</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Authors</h4>
                    <p class="text-3xl font-bold text-purple-500 mt-2">287</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Recently Added Books</h3>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($recentBooks as $book)
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $book->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $book->author }}</p>
                    </div>
                    @empty
                    <p class="text-gray-500 dark:text-gray-300">No books added yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Borrowed Books Section -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Borrowed Books</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($borrows as $borrow)
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $borrow->book->title }}</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">Due Date: <span class="font-bold text-red-500">{{ $borrow->due_date->format('Y-m-d') }}</span></p>

                        @if (!$borrow->returned_at)
                        <form action="{{ route('return.book', $borrow->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">Return</button>
                        </form>
                        @else
                        <p class="text-green-500 mt-2 font-semibold">Returned</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- User Actions -->


        </div>
    </div>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - BookNest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col h-screen fixed">
            <div class="p-4 text-center text-xl font-bold border-b border-gray-700">
                📚 BookNest Admin
            </div>

            <nav class="flex-1 mt-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">📊 Dashboard</a>
                <a href="{{ route('admin.books.index') }}" class="block px-4 py-2 hover:bg-gray-700">📚 Manage Books</a>
                <a href="{{ route('admin.books-borrow') }}" class="block px-4 py-2 hover:bg-gray-700">📚 Borrowed Books</a>
                <a href="{{ route('admin.manage-users') }}" class="block px-4 py-2 hover:bg-gray-700">👥 Manage Users</a>
            </nav>

            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto p-4">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-4 py-2 text-center rounded-md">
                    🚪 Logout
                </button>
            </form>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64">

            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">Admin Dashboard</h2>
                <div>
                    <span class="text-gray-600">Hello, Admin</span>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>

    </div>
</body>


</html>
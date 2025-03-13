<x-guest-layout>
    <div class="">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 sm:p-8">


            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100">🔐 Admin Login</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Please enter your credentials to access the admin panel.
                </p>
            </div>


            @if (session('error'))
            <div class="mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded">
                ⚠️ {{ session('error') }}
            </div>
            @endif


            <form method="POST" action="{{ route('admin.login') }}" class="mt-6 space-y-4">
                @csrf


                <div>
                    <label for="email" class="block font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400"></span>
                        <input id="email" type="email" name="email" required autofocus
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    </div>
                </div>


                <div>
                    <label for="password" class="block font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400"></span>
                        <input id="password" type="password" name="password" required
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
                    </div>
                </div>


                <div class="text-right">
                    <a href="#" class="text-blue-500 hover:underline text-sm">Forgot password?</a>
                </div>


                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition">
                        🔓 Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
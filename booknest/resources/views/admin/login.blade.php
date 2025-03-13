<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800">🔑 Admin Login</h2>
        <p class="text-gray-600 text-center mt-2">Welcome back! Please enter your credentials to access the admin panel.</p>

        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mt-4 rounded">
            <p>{{ $errors->first() }}</p>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" type="email" name="email" required autofocus placeholder="Enter your admin email" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="font-semibold text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" type="password" name="password" required placeholder="Enter your password" />
            </div>

            <div class="mt-2 text-sm text-gray-500">
                <p>⚠️ This login is for administrators only. If you're a regular user, please log in through the user portal.</p>
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full py-3 text-lg bg-blue-600 hover:bg-blue-700 transition duration-200 ease-in-out rounded-lg shadow-md text-center">
                    Login to Admin Panel
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
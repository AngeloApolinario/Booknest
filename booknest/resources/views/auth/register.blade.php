<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 shadow-lg rounded-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-900">📚 BookNest Registration</h2>
        <p class="text-center text-gray-600 mb-6">Create an account to access your favorite books!</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="text-blue-900 font-semibold" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email Address')" class="text-blue-900 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-blue-900 font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 shadow-sm"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-blue-900 font-semibold" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 shadow-sm"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-blue-700 hover:underline" href="{{ route('login') }}">
                    {{ __('Already have an account? Log in') }}
                </a>

                <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
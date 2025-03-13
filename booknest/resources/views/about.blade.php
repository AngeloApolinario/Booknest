<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-3xl font-semibold mb-4 text-gray-900">Welcome to BookNest 📚</h3>
                <p class="text-gray-700 text-lg leading-relaxed">
                    BookNest is your ultimate digital library, designed to bring book lovers closer to their favorite reads.
                    Whether you're looking for timeless classics, modern bestsellers, or undiscovered gems, BookNest is the place for you.
                </p>

                <h4 class="text-2xl font-semibold mt-6 text-gray-800">Our Mission</h4>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Our mission is to foster a love for reading by making books easily accessible to everyone. We believe in the power of stories to inspire, educate, and entertain, and we strive to build a community where readers can explore, share, and grow.
                </p>

                <h4 class="text-2xl font-semibold mt-6 text-gray-800">Why Choose BookNest?</h4>
                <ul class="list-disc list-inside text-gray-700 text-lg leading-relaxed mt-2">
                    <li>📖 A vast collection of books across multiple genres</li>
                    <li>🔍 Easy search and borrowing system</li>
                    <li>📅 Personalized borrowing and return tracking</li>
                    <li>👥 Community-driven book recommendations</li>
                    <li>🌍 Access from anywhere, anytime</li>
                </ul>

                <h4 class="text-2xl font-semibold mt-6 text-gray-800">Join Our Community</h4>
                <p class="text-gray-700 text-lg leading-relaxed">
                    BookNest is more than just a library—it’s a community of readers, thinkers, and dreamers. Join us today and start your journey into the world of books!
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
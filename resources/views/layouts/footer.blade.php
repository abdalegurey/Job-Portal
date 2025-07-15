<footer class="bg-gray-800 text-gray-200 py-8 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Logo and Description --}}
            <div>
                <h2 class="text-2xl font-bold text-white mb-2">JobPortal</h2>
                <p class="text-sm text-gray-400">
                    Find your dream job or the perfect candidate – all in one place.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-xl font-semibold mb-3 text-white">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('About') }}" class="hover:text-white">About</a></li>
                    <li><a href="{{ route('apply.form', 1) }}" class="hover:text-white">Apply Now</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="hover:text-white">Dashboard</a></li>
                    @endauth
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="text-xl font-semibold mb-3 text-white">Contact</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li>Email: info@jobportal.com</li>
                    <li>Phone: +252 61 2345678</li>
                    <li>Location: Mogadishu, Somalia</li>
                </ul>
            </div>

        </div>

        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} JobPortal. All rights reserved.
        </div>

    </div>
</footer>

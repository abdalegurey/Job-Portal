<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us - Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

  <nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">JobPortal</a>

            {{-- Mobile toggle --}}
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            {{-- Desktop Menu --}}
            <div id="menu" class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Contact</a>

                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a>
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                    </form>
                    <a href="{{ route("dashboard") }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                @endauth
            </div>
        </div>

        {{-- Mobile Menu Dropdown --}}
        <div id="mobile-menu" class="md:hidden hidden mt-4 space-y-2">
            <a href="{{ route('home') }}" class="block text-gray-700 hover:text-indigo-600">Home</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600">Contact</a>

            @guest
                <a href="{{ route('login') }}" class="block text-gray-700 hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="block text-gray-700 hover:text-indigo-600">Register</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-indigo-600">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>


    {{-- Contact Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-indigo-700 mb-6">Contact Us</h2>
            <p class="text-center text-gray-600 mb-12">
                Have questions or feedback? Send us a message and we’ll get back to you as soon as possible.
            </p>

            <form action="#" method="POST" class="space-y-6 bg-gray-100 p-8 rounded-lg shadow-md">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                    <input type="text" name="subject" id="subject"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="5" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white text-lg font-medium rounded-md hover:bg-indigo-700 focus:outline-none">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Mobile Menu Toggle Script --}}
    <script>
        const toggleBtn = document.getElementById("menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        toggleBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    </script>
</body>
</html>

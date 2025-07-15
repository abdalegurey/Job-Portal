<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Job Portal - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
      @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    {{-- Header --}}
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
                <a href="{{ route("Contact")}}" class="text-gray-700 hover:text-blue-600">Contact</a>

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
            <a href="{{ route("Contact")}}" class="block text-gray-700 hover:text-blue-600">Contact</a>

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


    {{-- Hero Section --}}
  <section class="bg-indigo-50 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-4">Find Your Dream Job</h1>
        <p class="text-xl text-gray-600 mb-6">Discover top jobs and apply in minutes.</p>

        @auth
            <a href="{{ route('apply.form', 1) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded text-lg font-medium">
                Apply Now
            </a>
        @else
            <a href="{{ route('login') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded text-lg font-medium">
                Login to Apply
            </a>
        @endauth

    </div>
</section>


    {{-- How It Works --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 border rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-2">1. Browse Jobs</h3>
                    <p class="text-gray-600">View job listings and find roles that match your skills.</p>
                </div>
                <div class="p-6 border rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-2">2. Apply Easily</h3>
                    <p class="text-gray-600">Fill in your details and submit your application online.</p>
                </div>
                <div class="p-6 border rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-2">3. Get Hired</h3>
                    <p class="text-gray-600">Wait for approval and start your new career!</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Latest Jobs --}}
<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Latest Jobs</h2>

        @if($jobs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($jobs as $job)
                    <div class="bg-white p-6 rounded shadow hover:shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h3>

                        <p class="text-gray-700 mt-2 mb-3 text-sm">
                            {{ \Illuminate\Support\Str::limit($job->description, 100) }}
                        </p>

                        @php
                            $deadline = \Carbon\Carbon::parse($job->deadline);
                        @endphp

                        <p class="text-gray-600 mb-2">
                            Deadline:
                            @if($deadline->isPast())
                                <span class="text-red-600 font-semibold">Expired ({{ $deadline->format('F d, Y') }})</span>
                            @else
                                {{ $deadline->format('F d, Y') }}
                            @endif
                        </p>

                        @if($deadline->isFuture())
                            @auth
                                <a href="{{ route('apply.form', $job->id) }}" class="text-indigo-600 hover:underline">Apply Now</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 underline">Login to Apply</a>
                            @endauth
                        @else
                            <span class="text-gray-400 italic">Applications closed</span>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600">No jobs available at the moment. Please check back later.</p>
        @endif
    </div>
</section>



    {{-- Call to Action --}}
    <section class="bg-indigo-600 py-16 text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to take the next step?</h2>
        <p class="text-lg mb-6">Start your journey toward your dream job now.</p>
        <a href="{{ route('apply.form', 1) }}" class="bg-white text-indigo-600 px-6 py-3 rounded font-semibold hover:bg-gray-100">
            Apply Now
        </a>
    </section>

    <script>
    const toggleBtn = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");

    toggleBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
</script>


    @include('layouts.footer')
</body>
</html>

<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">JobPortal</a>
            </div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600">Home</a>
                <a href="{{ route('apply.form', 1) }}" class="text-gray-700 hover:text-green-600">Apply</a>
                {{-- <a href="#" class="text-gray-700 hover:text-blue-600">About</a> --}}
            </div>
        </div>
    </div>
</nav>

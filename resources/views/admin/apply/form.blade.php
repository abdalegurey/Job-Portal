<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Apply for {{ $job->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
      @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">

        <h1 class="text-2xl font-bold mb-6 text-center">Apply for: <span class="text-indigo-600">{{ $job->title }}</span></h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('apply.submit', $job->id) }}" method="POST" class="space-y-6">
            @csrf

            {{-- Full Name --}}
            <div>
                <label for="full_name" class="block font-semibold mb-1">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                @error('full_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block font-semibold mb-1">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block font-semibold mb-1">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                @error('phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- LinkedIn (optional) --}}
            <div>
                <label for="linkedin" class="block font-semibold mb-1">LinkedIn Profile (optional)</label>
                <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                @error('linkedin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Education --}}
            <div>
                <label for="education" class="block font-semibold mb-1">Education</label>
                <textarea id="education" name="education" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('education') }}</textarea>
                @error('education')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Experience --}}
            <div>
                <label for="experience" class="block font-semibold mb-1">Experience</label>
                <textarea id="experience" name="experience" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('experience') }}</textarea>
                @error('experience')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Skills --}}
            <div>
                <label for="skills" class="block font-semibold mb-1">Skills</label>
                <textarea id="skills" name="skills" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('skills') }}</textarea>
                @error('skills')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Cover Letter --}}
            <div>
                <label for="cover_letter" class="block font-semibold mb-1">Cover Letter</label>
                <textarea id="cover_letter" name="cover_letter" rows="5"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('cover_letter') }}</textarea>
                @error('cover_letter')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded font-semibold">
                    Submit Application
                </button>
            </div>
        </form>
    </div>

</body>
</html>

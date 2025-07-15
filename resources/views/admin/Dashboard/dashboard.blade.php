<x-app-layout>
    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-4xl font-extrabold mb-10 text-gray-900">Welcome to Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

            <x-dashcard
                text="{{ $totalJobs }}"
                desc="Total Jobs"
                textColor="text-red-800"
                bg="bg-red-100"
                icon="fas fa-briefcase"
            />

            <x-dashcard
                text="{{ $openJobs }}"
                desc="Open Jobs"
                textColor="text-yellow-800"
                bg="bg-yellow-100"
                icon="fas fa-hourglass-start"
            />

            <x-dashcard
                text="{{ $totalApplicants }}"
                desc="Applicants"
                textColor="text-green-800"
                bg="bg-green-100"
                icon="fas fa-users"
            />

        </div>

       

    </div>
</x-app-layout>

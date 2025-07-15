<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Jobs') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

<x-success />

            <div class="mb-4 flex justify-end">
                <a href="{{ route("adminjobs.create") }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    + Create New Job
                </a>
            </div>

            <div class="overflow-x-auto bg-white shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                             <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deadline</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posted</th>
                             <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created_at</th>
                             <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Updted_at</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                   <tbody class="divide-y divide-gray-200">
    @forelse ($jobs as $job)
        <tr>
            <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $job->title }}</x-td>
             <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $job->description }}</x-td>
            <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $job->deadline->format('M d, Y') }}</x-td>
            <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $job->created_at->diffForHumans() }}</x-td>
              <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $job->created_at }}</x-td>
            <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $job->updated_at }}</x-td>
            <x-td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 space-x-2">
                <a href="{{ route("adminjobs.edit", $job) }}" class="text-blue-600 hover:underline">Edit</a>
                <a href="{{ route("adminjobs.applicants", $job) }}" class="text-green-600 hover:underline">Applicants</a>
                <form action="{{ route("adminjobs.destroy", $job) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this job?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </x-td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No jobs found.</td>
        </tr>
    @endforelse

    {{ $jobs->links() }}
</tbody>


                </table>
            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Applicants for: {{ $job->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md rounded p-6">
                @if($applicants->isEmpty())
                    <p class="text-gray-500">No applicants have applied for this job yet.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Phone</th>
                                 <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Linkidn</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Education</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Experience</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Skills</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Submitted</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($applicants as $applicant)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $applicant->full_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $applicant->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $applicant->phone }}</td>
                                   <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
  @if($applicant->linkedin)
    <a href="{{ $applicant->linkedin }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
      {{ $applicant->linkedin }}
    </a>
  @else
    N/A
  @endif
</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $applicant->education }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $applicant->experience }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $applicant->skills }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $applicant->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

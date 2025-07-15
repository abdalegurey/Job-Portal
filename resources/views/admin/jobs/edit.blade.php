<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Job') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-6 py-4">
                <form action="{{ route('adminjobs.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Job Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $job->title) }}" autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Job Description')" />
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $job->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <!-- Deadline -->
                    <div class="mb-4">
                        <x-input-label for="deadline" :value="__('Application Deadline')" />
                        <x-text-input id="deadline" name="deadline" type="date" class="mt-1 block w-full" value="{{ old('deadline', \Carbon\Carbon::parse($job->deadline)->format('Y-m-d')) }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('deadline')" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <x-primary-button class="ml-3">
                            {{ __('Update Job') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

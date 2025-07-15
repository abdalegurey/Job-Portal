<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">
        <x-dashcard text="{{$users->total() }}" textColor="text-red-800" bg="bg-red-200"  desc="Total users" bg="bg-red-200" icon="fa fa-book"/>
        
        <x-dashcard text="{{$admins}}" desc="Admin" textColor="text-pink-800" bg="bg-pink-200" icon="fa fa-list" />
  
        <x-dashcard text="{{ $user}}" desc="User" textColor="text-green-800" bg="bg-green-200" icon="fa fa-user" />
       
       
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Users List</h2>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Created At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $user->email }}</td>
                           <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">
    <a href="{{ route('adminusers.edit', $user->id) }}">Change Role</a>
</td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>

<x-section>
<header>
        <h2 class="text-lg font-medium text-gray-900">
           edit Role
        </h2>

        <p class="mt-1 text-sm text-gray-600">
           <!-- @error("name")
          <p class="text-red-700"> {{ $message }}</p>

           @enderror

           @error("desc")
          <p class="text-red-700"> {{ $message }}</p>

           @enderror -->
<!-- 
           @if($errors->any())

           @foreach ($errors->all() as $error )
           <p class="text-red-700"> {{ $error }}</p>

               
           @endforeach
               
           @endif -->
           <x-input-error class="mt-2" :messages="$errors->all()" />
           <x-success/>
       

         
          
        </p>
      
    </header>
<form method="post" action="{{ route("adminusers.update",$users->id)}}" class="mt-6 space-y-6">
@csrf
@method("PATCH")
<div>
            <x-input-label for="name" :value="__('Name')" />
            <!-- <x-text-input id="name" name="name" type="text" class="mt-1 block w-full mb-2" autofocus autocomplete="name" 
            value="" /> -->
            <!-- <span><x-input-error class="mt-2" :messages="$errors->get('name')" /></span> -->
            <!-- <textarea name="desc" id=""></textarea> -->
            <!-- <span><x-input-error class="mt-2" :messages="$errors->get('desc')" /></span> -->
            <h1>{{ $users->username}}</h1>

            <select name="role" id="role" class="p-2 block rounded mt-2 w-full text-slate-500">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}"
                                {{ $role === $users->role ? 'selected' : '' }}>
                                {{ $role }}</option>
                        @endforeach
                    </select>
          
            <x-primary-button class="mt-2">Update</x-primary-button>

     </div>

</form>
  
    </x-section>

</x-app-layout>
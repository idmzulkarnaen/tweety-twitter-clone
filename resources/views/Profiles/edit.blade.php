<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="name" class="block text-gray-700 text-xs font-bold mb-2 uppercase">
                name
            </label>

            <input id="name" type="text" class="border border-grey-400 p-2 w-full"  name="name" value="{{ $user->name }}" required >

            @error('name')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="username" class="block text-gray-700 text-xs font-bold mb-2 uppercase">
                username
            </label>

            <input id="username" type="text" class="border border-grey-400 p-2 w-full"  name="username" value="{{ $user->username }}" required >

            @error('username')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div> 

        <div class="mb-6">
            
            <label for="avatar" class="block text-gray-700 text-xs font-bold mb-2 uppercase">
                avatar
            </label>
            
            <div class="flex">
                <input id="avatar" type="file" class="border border-grey-400 p-2 w-full"  name="avatar" value="{{ $user->avatar }}" >

                <img src="{{ $user->avatar }}" alt="alt your avatar" width="40">
                
                    
            </div>
            @error('avatar')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
            @enderror
        </div> 


        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-xs font-bold mb-2">
                email
            </label>

            <input id="email" type="email" class="border border-grey-400 p-2 w-full"  name="email" value="{{ $user->email }}" required >

            @error('email')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-xs font-bold mb-2">
                password
            </label>

            <input id="password" type="password" class="border border-grey-400 p-2 w-full"  name="password" required>

            @error('password')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-xs font-bold mb-2">
                password confirmasi
            </label>

            <input id="password_confirmation" type="password" class="border border-grey-400 p-2 w-full"  name="password_confirmation" required >

            @error('password')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <div class="mb-6">
            
            <button type="submit" 
                    class="bg-blue-400 text-white-rounded py-2 px-4 hover:bg-blue-500 mr-4">
                submit
            </button>

            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>

        
        
    </form>
</x-app>
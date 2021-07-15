<form method="POST" action="/login">
    @csrf

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
            username :
        </label>

        <input class="border border-gray-400 p-2 w-full"
               type="text"
               name="username"
               id="username"
               value="{{old('username')}}"
        >
        @error('username')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
            password :
        </label>

        <input class="border border-gray-400 p-2 w-full"
               type="password"
               name="password"
               id="password"
        >
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>



    <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            Submit
        </button>
    </div>

    @error('msg')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

</form>


<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">{{trans('translation.Login')}}</h1>


            <form method="POST" action="/login">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-md text-gray-700" for="username">
                        {{trans('translation.Username')}} :
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
                    <label class="block mb-2 uppercase font-bold text-md text-gray-700" for="email">
                        {{trans('translation.Password')}} :
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
                        {{trans('translation.Submit')}}
                    </button>
                </div>

                @error('msg')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </form>


        </main>
    </section>
</x-layout>

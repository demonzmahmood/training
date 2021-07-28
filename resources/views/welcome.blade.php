

<x-layout>

    <div class="container">
        <main class=" mx-auto bg-gray-100 border-gray-200 p-6 rounded-xl ">


            @guest
                <h1 class="text-center font-bold text-xl">{{trans('translation.WelcomeGuest')}}</h1>
            <div class="mb-6">
                <a href="/login" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">{{trans('translation.Login')}}</a>
                <a href="/register" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">{{trans('translation.Register')}}</a>
            </div>
            @endguest

            @role('user')

                <h1 class="text-center font-bold text-xl">{{trans('translation.WelcomeUser')}}</h1>
            <div class="mb-6">
                <a href="/user" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">{{trans('translation.Dashboard')}}</a>
            </div>
            @endrole


            @role('admin')
                <h1 class="text-center font-bold text-xl">{{trans('translation.WelcomeAdmin')}}</h1>
            <div class="mb-6">
                <a href="/admin" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">{{trans('translation.Dashboard')}}</a>
            </div>
            @endrole

        </main>
    </div>


</x-layout>

<!doctype html>

<title>Register</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">



    <div class="mt-8 md:mt-0">

        @auth
            <span class="text-lg front-bold uppercase">welcome, {{auth()->user()->username}}</span>

            <form method="POST" action="/logout">
                @csrf

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Log Out</button>
            </form>
        @endauth

    </div>


    {{ $slot }}


</section>


@if(session()->has('success'))
    <div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl button-3 right-3 text-sm">
        <p>{{session('success')}}</p>
    </div>
@endif
</body>

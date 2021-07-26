<!doctype html>

<html>
<title>Welcome</title>


<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


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
</html>

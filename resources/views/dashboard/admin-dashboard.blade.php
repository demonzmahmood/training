
<x-layout>

    <link rel="stylesheet" href="style.css">
        <section>
            <div class="container">
                <main class=" mx-auto bg-gray-100 border-gray-200 p-6 rounded-xl ">
                <h1 class="text-center font-bold text-xl">Admin Panel</h1>
                    <div class="mb-6">
                        @auth
                            <form method="POST" action="/admin" >
                                @csrf
                                <button type="submit" name="edit" value="users" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Edit Users</button>
                                <button type="submit" name="edit" value="admins" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Edit Admins</button>
                            </form>
                        @endauth
                    </div>


                    @if(isset($users))
                        <table >
                            <tr>
                                <td>Id</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Edit</td>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['username']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        <a href="admin/delete/{{$user['id']}}">Delete</a> |
                                        <a href="admin/edit/{{$user['id']}}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    @if(isset($data))
                        <x-AdminEditForm/>
                    @endif



                </main>
             </div>
         </section>


</x-layout>

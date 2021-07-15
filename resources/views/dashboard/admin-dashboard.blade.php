
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
                                        <a href="admin/delete/{{$user['id']}}">Delete</a>
                                        <a href="admin/edit/{{$user['id']}}">edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    @if(isset($data))
                        <form>
                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                                    username :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="text"
                                       name="username"
                                       id="username"
                                       value = {{$data['username']}}
                                >

                            </div>


                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                                    email :
                                </label>

                                <input class="border border-gray-400 p-2 w-full"
                                       type="email"
                                       name="email"
                                       id="email"
                                       value = {{$data['email']}}
                                >

                            </div>


                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                                   New password :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="password"
                                       name="password"
                                       id="password"

                                >

                            </div>

                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="role">
                                    Role :
                                </label>
                                <select name="role" id="role" class="border border-gray-400 p-2 w-full">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>

                            </div>

                            <div class="mb-6">
                                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                                    Submit
                                </button>
                            </div>

                        </form>
                    @endif



                </main>
             </div>
         </section>


</x-layout>


<x-layout>

            <div class="container">
                <main class=" mx-auto bg-gray-100 border-gray-200 p-6 rounded-xl ">
                <h1 class="text-center font-bold text-xl">Admin Panel</h1>

                    <div class="mb-6">
                        <a href="/admin/edit-users" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Edit Users</a>
                        <a href="/admin/edit-admins" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Edit Admins</a>
                        <a href="/admin/create" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Create new User</a>
                    </div>



                    <!-- retrieve the information of current users.-->
                    @if(isset($users))
                        <div class="mb-6">
                            <table class="text-center w-full border-collapse border border-green-800 ...">
                                <thead>
                            <tr>
                                <th class="border border-green-600 ...">Id</th>
                                <th class="border border-green-600 ...">Username</th>
                                <th class="border border-green-600 ...">Email</th>
                                <th class="border border-green-600 ..." colspan="2">Operations</th>
                            </tr>
                                </thead>

                                <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <td class="border border-green-600 ...">{{$user['id']}}</td>
                                    <td class="border border-green-600 ...">{{$user['username']}}</td>
                                    <td class="border border-green-600 ...">{{$user['email']}}</td>
                                    <td class="border border-green-600 ...">
                                        <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">
                                            <a href="/admin/{{$user['id']}}/edit">edit</a>
                                        </button>
                                    </td>
                                    <td class="border border-green-600 ...">
                                        <form method="post" action="/admin/{{$user['id']}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                                </tbody>
                        </table>
                        </div>
                    @endif
                <!--  |--------------------------------------------------------------------------End of list of users . -->


                <!--  a form to edit specific user data -->
                    @if(isset($data))
                        <form action="/admin" method="post">
                            @csrf
                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                                    username :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="text"
                                       name="username"
                                       id="username"
                                       value="{{$data['username']}}">
                                @error('username')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>


                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                                    email :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="email"
                                       name="email"
                                       id="email"
                                       value = "{{$data['email']}}">
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>


                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                                   New password :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="password"
                                       name="password"
                                       id="password"
                                       >
                                <input type="hidden" name="currentpass" value="{{$data['password']}}">
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

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
                                <input type="hidden" name="userid" value={{$data['id']}}>
                                <button type="submit" name="operation" value="update" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                                    Submit
                                </button>
                            </div>

                        </form>
                    @endif
                <!--  |--------------------------------------------------------------------------End of Edit Form.-->


                <!--  a form to create new user . -->
                    @if(isset($create))

                        <form action="/admin" method="post">
                            @csrf
                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                                    username :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="text"
                                       name="username"
                                       id="username">

                                @error('username')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>


                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                                    email :
                                </label>


                                <input class="border border-gray-400 p-2 w-full"
                                       type="email"
                                       name="email"
                                       id="email">
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>


                            <div class="mb-6">
                                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                                    New password :
                                </label>
                                <input class="border border-gray-400 p-2 w-full"
                                       type="password"
                                       name="password"
                                       id="password">
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
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
                                <button type="submit" name="operation" value="create" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                                    Submit
                                </button>
                            </div>

                        </form>

                    @endif
                <!--  |--------------------------------------------------------------------------End of Create Form.-->




                </main>
             </div>



</x-layout>

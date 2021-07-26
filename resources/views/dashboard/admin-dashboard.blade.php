
<x-layout>

            <div class="container">
                <main class=" mx-auto bg-gray-100 border-gray-200 p-6 rounded-xl ">
                <h1 class="text-center font-bold text-xl">Admin Panel</h1>

                    <div class="mb-6">
                        <a href="/admin/edit-users" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Edit Users</a>
                        <a href="/admin/create" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Create new User</a>
                    </div>



                    <!-- retrieve the information of current users.-->
                    @if(isset($datatable))
                        <div class="container" style="margin-top: 50px;">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <script type="text/javascript">
                            $(function() {

                                var table = $('#data-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: '{{url("admin/edit-users")}}',
                                    columns: [{
                                        data: 'id',
                                        name: 'id'
                                    },
                                        {
                                            data: 'username',
                                            name: 'username'
                                        },
                                        {
                                            data: 'email',
                                            name: 'email'
                                        },
                                        {
                                            data: 'role',
                                            name: 'role'
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            orderable: false,
                                            searchable: false
                                        },
                                    ]
                                });

                            });
                        </script>

                    @endif

                <!--  |--------------------------------------------------------------------------End of list of users . -->

                <!--  a form to edit specific user data -->
                    @if(isset($data))
                        <form action="/admin/{{$data['id']}}" method="post">
                            @csrf
                            @method('PUT')
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
                                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
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

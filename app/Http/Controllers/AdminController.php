<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostRequest;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index()
    {

            return view('dashboard.admin-dashboard');

    }

//store function manage update and create user.


    public function store(AdminPostRequest $request)
    {
        switch (request()->input('operation')) {
            case 'create':
                $credentials = $request->except('operation');
                $credentials['password'] = bcrypt($credentials['password']);

                $user = User::create($credentials);
                if ($credentials['role']=='user') {
                    $user->assignRole('user');
                }
                elseif ($credentials['role']=='admin'){
                    $user->assignRole('admin');
                }

                return redirect('/admin')
                    ->with('success', 'User has been created.');



            case 'update':
                $credentials= $request->except('operation');
                $user=User::find($credentials['userid']);
                $hashpass = $user->password;

                if(password_verify($credentials['password'],$hashpass)||trim($credentials['password'])==''){
                    $credentials['password'] = $hashpass;}
                else {
                    $credentials['password'] = bcrypt($credentials['password']);
                }


               User::where('id', $credentials['userid'])
                    ->update(['username' => $credentials['username'], 'email' => $credentials['email'],'password'=>$credentials['password'],'role'=>$credentials['role']]);



                if ($credentials['role']=='user') {
                  $user->syncRoles(['user']);
                }
                elseif ($credentials['role']=='admin'){
                    $user->syncRoles(['admin']);
                }


                return redirect('/admin')
                    ->with('success', 'User Profile has been updated.');

            default:
                return view('dashboard.admin-dashboard');
        }
    }






    public function show($edit)
    {
        switch ($edit) {
            case 'edit-admins':
                $data = User::all()->where('role', 'admin');
                return view('dashboard.admin-dashboard', ['users' => $data]);
            case 'edit-users':
                $data = User::all()->where('role', 'user');
                return view('dashboard.admin-dashboard', ['users' => $data]);
            default:
                return view('dashboard.admin-dashboard');
        }

    }


    public function create()
    {
        return view('dashboard.admin-dashboard', ['create' => true]);
    }



    public function edit($id)
    {

        $data = User::find($id);
        return view('dashboard.admin-dashboard', ['data' => $data]);

    }

    public function destroy($id)
    {

        $data = User::find($id);
        $data->delete();
        return redirect('/admin')->with('success', 'User has been deleted successfully');

    }


}

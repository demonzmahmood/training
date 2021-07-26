<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;


class AdminController extends Controller
{

    public function index()
    {

        return view('dashboard.admin-dashboard');

    }



    public function create()
    {
        return view('dashboard.admin-dashboard', ['create' => true]);
    }



    public function store(RegisterPostRequest $request)
    {

        $credentials = $request->validated();
        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);
        if ($credentials['role'] == 'user') {
            $user->assignRole('user');
        } elseif ($credentials['role'] == 'admin') {
            $user->assignRole('admin');
        }

        return redirect('/admin')
            ->with('success', 'User has been created.');


    }



    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "<a href=/admin/" . $row->id . "/edit" . " class='edit btn btn-primary btn-sm'>View</a>";
                    $btn2 = "<form method='post' action='/admin/$row->id' style = 'display:inline'>
                            " . csrf_field() . method_field('DELETE') . "
                                <button type='submit' class='delete btn btn-danger btn-sm'>delete</button>
                           </form>";


                    return $btn . $btn2;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.admin-dashboard', ['datatable' => true]);
    }




    public function edit($id)
    {

        $data = User::find($id);
        return view('dashboard.admin-dashboard', ['data' => $data]);

    }



    public function update(UpdatePostRequest $request)
    {

        $credentials = $request->validated();
        $user = User::find($credentials['userid']);
        $user->username = $credentials['username'];
        $user->email = $credentials['email'];
        $user->role = $credentials['role'];

        if (!empty($request->password)) {
            $user->password = bcrypt($credentials['password']);
        }

        $user->save();


        if ($credentials['role'] == 'user') {
            $user->syncRoles(['user']);
        } elseif ($credentials['role'] == 'admin') {
            $user->syncRoles(['admin']);
        }


        return redirect('/admin')
            ->with('success', 'User Profile has been updated.');


    }




    public function destroy($id)
    {

        $data = User::find($id);
        $data->delete();
        return redirect('/admin')->with('success', 'User has been deleted successfully');

    }


}

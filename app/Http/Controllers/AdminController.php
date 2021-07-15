<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin view
    public function index()
    {
            return view('dashboard.admin-dashboard');
    }

    public function store(){
        switch(request()->input('edit')){
            case 'admins':
                $data=User::all()->where('role','admin');
                return view('dashboard.admin-dashboard',['users'=>$data]);
            case 'users':
                $data=User::all()->where('role','user');
                return view('dashboard.admin-dashboard',['users'=>$data]);
            default:
                return view('dashboard.admin-dashboard');
        }
    }

    public function showdata($id){

        $data= User::find($id);
        return view('dashboard.admin-dashboard',['data'=>$data]);

    }

    public function delete($id){

        $data=User::find($id);
        $data->delete();
        return redirect('/admin')->with('success' , 'User has been deleted successfully');

    }




}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    //profile view
    public function create()
    {
        return view('dashboard.user-dashboard');
    }




    // profile info and update
    public function store()
    {
        $userid=Auth::id();

        $attributes = request()->validate([
            'username'=>"required|min:3|unique:users,username,$userid|regex:/(^([a-zA-Z]+)(\d+)?$)/u",
            'email'=>"required|email|unique:users,email,$userid"
        ]);

        $update=User::find($userid);
        $update->username=$attributes['username'];
        $update->email=$attributes['email'];
        $update->save();
        return redirect('/profile')->with('success', 'Your Profile has been updated.');
    }




}

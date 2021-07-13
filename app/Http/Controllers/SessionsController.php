<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    //login view
    public function create(){
        return view('sessions.create');
    }


    // check login info and login
    public function store()
    {
    $attributes= request()->validate([
        'username'=>'required',
        'password'=>'required'
    ]);

    if(auth()->attempt($attributes)) {
       session()->regenerate();
        if(auth()->user()->hasRole('user')) {
            return redirect('/')->with('success', 'Welcome User');
        }
        elseif (auth()->user()->hasRole('admin')){
            return redirect('/')->with('success', 'Welcome Admin');
        }


    }
   throw ValidationException::withMessages(['username'=>'Your username or password are not correct']);

    }


    //log out
    public function destroy()
    {
        auth()->logout();
        return redirect('/login')->with('success','You have successfully logout');
    }
}

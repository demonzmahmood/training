<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create(){

        return view('sessions.create');


    }

    public function store()
    {
    $attributes= request()->validate([
        'username'=>'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
        'password'=>'required'
    ]);

    if(auth()->attempt($attributes))
    {
        session()->regenerate();
    return redirect('/')->with('success','Welcome Back');
    }

   throw ValidationException::withMessages(['username'=>'Your username or password are not correct']);


    }

    public function destroy()
    {

        auth()->logout();
        return redirect('/register')->with('success','You have successfully logout');

    }
}

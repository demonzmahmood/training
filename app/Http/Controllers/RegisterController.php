<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{

    public function create(){

        return view('register.create');
    }

    public function store(){


      $attributes = request()->validate([
           'username'=>'required|min:3|unique:users,username|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
           'email'=>'required|email|unique:users,email',
           'password'=>'required'
           ]);

       $user= User::create($attributes);

       auth()->login($user);

       return redirect('/')->with('success','Your account has been created.');
    }
}

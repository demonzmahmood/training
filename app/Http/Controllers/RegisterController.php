<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{

    // register view
    public function create(){

        return view('register.create');
    }




    // check register info and register
    public function store(){


      $attributes = request()->validate([
           'username'=>'required|min:3|unique:users,username|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
           'email'=>'required|email|unique:users,email',
           'password'=>'required'
           ]);

      $attributes['password']=bcrypt($attributes['password']);

       $user= User::create($attributes);

       // assign role for regular user
         $user->assignRole('user');

          auth()->login($user);


           return redirect('/')->with('success', 'Your account has been created.');

    }
}

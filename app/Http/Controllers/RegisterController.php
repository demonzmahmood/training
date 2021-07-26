<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;


class RegisterController extends Controller
{

    // register view
    public function index(){

        return view('register.create');
    }


    // check register info and register
    public function store (RegisterPostRequest $request)
    {
        $credentials = $request -> only('username' , 'email' , 'password');
        $credentials['password'] = bcrypt($credentials['password']);
        $credentials['role'] = 'user';

        $user = User ::create($credentials);
        $user -> assignRole('user');
        auth() -> login($user);

        return redirect('/')
            -> with('success' , 'Your account has been created.');

    }
}



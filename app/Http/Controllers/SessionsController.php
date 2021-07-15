<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginPostRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class SessionsController extends Controller
{

    //login view
    public function index(){
        return view('sessions.create');
    }


    // check login info and login
    public function store(LoginPostRequest $request)
    {
        $credentials = $request -> only('username' , 'password');

        if (auth() -> attempt($credentials)) {
            session() -> regenerate();
            return redirect('/') -> with('success' , 'Welcome');
        }
        else throw ValidationException ::withMessages(['msg' => 'Your provided incorrect credentials']);
    }


    //logout
    public function destroy()
    {
        auth()->logout();
        return redirect('/login')
            ->with('success','You have successfully logout');
    }
}

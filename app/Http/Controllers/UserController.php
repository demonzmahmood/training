<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //profile view
    public function index()
    {
        return view('dashboard.user-dashboard');
    }



    // profile info and update
    public function store(EditPostRequest $request) // request $rq
    {
        $credentials = $request->only('username' , 'email');
        User::where('id' , auth()->id())
            ->update(['username' => $credentials['username'] , 'email' => $credentials['email']]);

        return redirect('/user')
            ->with('success' , 'Your Profile has been updated.');
    }


}

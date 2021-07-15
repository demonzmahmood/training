<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    //profile view
    public function index()
    {
        return view('dashboard.user-dashboard');
    }



    // profile info and update
    public function store (ProfilePostRequest $request) // request $rq
    {
        $credentials = $request->only('username' , 'email');
        User::where('id' , auth()->user()->id)
            ->update(['username' => $credentials['username'] , 'email' => $credentials['email']]);

        return redirect('/profile')
            ->with('success' , 'Your Profile has been updated.');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show registration form
    public function registerForm(){
        return view('users.register');
    }

    public function register(Request $request){
        $form = $request->validate([
            'title'=> 'required',
            'company'=> ['required'],
            'location'=> 'required',
            'website'=> 'required',
            'email'=> ['required', 'email'],
            'tags'=> 'required',
            'description'=> 'required'
        ]);

        User::create($form);

        return back()->with('message', 'User created');
    }
}

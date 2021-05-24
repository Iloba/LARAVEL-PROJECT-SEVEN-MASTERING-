<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    

    //index function
    public function index(){
        return view('auth.login');
    }

    //login user 
    public function LoginUser(Request $request){


        //Validate form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]); 


        //Sign User in
       if(! auth()->attempt($request->only('email', 'password'), $request->remember)){
           return back()->with('status', 'invalid credentials');
       }

        //Redirect User
        return redirect()->route('dashboard');

    }
}

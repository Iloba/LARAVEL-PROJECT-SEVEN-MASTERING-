<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }

    //register user
    public function index(){
        return view('auth.register');
    }

    //Store user
    public function store(Request $request){
        //Validate Form
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|confirmed'


        ]);


        //Store User
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);



        //Sign the User in
        auth()->attempt($request->only('email', 'password'));


        //Redirect

        return redirect()->route('dashboard');
    }
}

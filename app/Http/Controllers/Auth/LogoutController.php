<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //logout user
    public function logout(){

        //Logout User
        auth()->logout();

        //Redirect to Home page
        return redirect()->route('home');


    }
}

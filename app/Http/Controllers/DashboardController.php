<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index method
    public function index(){
        return view('dashboard');
    }
}

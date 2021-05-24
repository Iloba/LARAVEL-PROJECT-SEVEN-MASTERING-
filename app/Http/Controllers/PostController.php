<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //index function
    public function index(){
        return view('posts.index');
    }

    //store posts
    public function store(Request $request){

        //Validate Form
        $this->validate($request, [
            'body' => 'required'
        ]);
           
        //Create a post by a user
        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
        
    }
}

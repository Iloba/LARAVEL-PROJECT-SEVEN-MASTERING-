<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //index function
    public function index(){

        $posts = Post::paginate(24);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    //store posts
    public function store(Request $request){

        //Validate Form
        $this->validate($request, [
            'body' => 'required'
        ]);
           
        //Create a post by a user
        $request->user()->posts()->create($request->only('body'));

        return back();
        
    }
}

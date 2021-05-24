<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    //Middleware
    public function __construct(){
        $this->middleware(['auth']);
    }

    //like functionality
    public function like(Request $request, Post $post){


        //Check if user has already liked post
        if($post->likedBy($request->user())){
            return response(null, 409);
        }
    
        //Create likes
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        //Redirect Back
        return back();
    }
}

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

    //like functionality (Store Like)
    public function like(Request $request, Post $post){


        //Check if user has already liked post
        if($post->likedBy($request->user())){
            return response(null, 409); //Conflict Http
        }
    
        //Create likes
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        //Redirect Back
        return back();
    }


    //Delete Likes
    public function destroy(Request $request, Post $post){
       
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}

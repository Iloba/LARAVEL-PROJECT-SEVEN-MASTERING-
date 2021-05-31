<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        //send email after liking
       if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id()->count())){
        Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
       }

        //Redirect Back
        return back();
    }


    //Delete Likes
    public function destroy(Request $request, Post $post){
       
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}

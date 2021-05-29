<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //index function
    public function index(){


        //Add eager loading to reduce number of queries
        $posts = Post::latest()->with(['user', 'likes'])->paginate(24);

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

    public function destroy(Post $post){
        

        //Only Authorized Users can delete Posts
        if(!$post->ownedBy(auth()->user())){
            return response(null, 406);
        }

        $post->delete();

        return back();
    }
}

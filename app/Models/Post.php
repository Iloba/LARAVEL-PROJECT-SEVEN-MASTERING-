<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',

    ];


    //User relationship
    public function user(){
        return $this->belongsTo(User::class);
    }


    //Likes relationship
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //check if user has already liked a post
    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}

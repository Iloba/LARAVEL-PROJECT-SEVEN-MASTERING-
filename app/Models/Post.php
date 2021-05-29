<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
 
    ];


    //User relationship (A post belongs to a user)
    public function user(){
        return $this->belongsTo(User::class);
    }


    //Likes relationship Post can have many likes
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //check if user has already liked a post
    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }


    public function ownedBy(User $user){
        return $user->id === $this->user_id;
    }
}

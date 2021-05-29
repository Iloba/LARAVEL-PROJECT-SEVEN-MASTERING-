<div class="bg-gray-100 shadow p-3 mb-2">
    @props(['post' => $post])
    <a class="text-blue-500 mb-2 font-bold" href="{{route('users.post', $post->user)}}">{{$post->user->username}}</a>
     <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span> <br>
    <p class="mb-2">{{$post->body}}</p>
    @auth
        @if ($post->ownedBy(auth()->user()))
            <div>
                <form action="{{route('posts.delete', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
            </div>
        @endif
    @endauth
   

    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>
            @else
                <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
        
            @endif
           
        @endauth
        <span>{{$post->likes->count()}}  {{Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>
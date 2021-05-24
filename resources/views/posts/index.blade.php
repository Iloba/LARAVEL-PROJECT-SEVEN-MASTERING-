@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-2 shadow">
            <form action="{{route('posts')}}" method="POST" class="mb-3">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Post Something!!"
                    ></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror

                </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                <div>

                </div>

            </form>
            <div class="mt-2">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="bg-gray-100 shadow p-3 mb-2">
                            <a class="text-blue-500 mb-2 font-bold" href="">{{$post->user->username}}</a>
                             <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span> <br>
                            <p class="mb-2">{{$post->body}}</p>


                            <div class="flex items-center">
                                @if (!$post->likedBy(auth()->user()))
                                <form action="{{route('posts.likes', $post->id)}}" method="POST" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                                @else
                                <form action="{{route('posts.likes', $post->id)}}" method="POST" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                                @endif
                                
                               

                                <span>{{$post->likes->count()}}  {{Str::plural('like', $post->likes->count())}}</span>
                            </div>
                        </div>
                    @endforeach
                    {{$posts->links()}}
                @else
                    <p>No records found</p>
                @endif
                
            </div>
        </div>
        
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
       
        <div class="w-8/12 ">
            <div class="p-6">
                <h2 class="text-2xl">{{$user->name}}</h2>
                <p>
                    {{$user->name }} Posted {{$user->posts->count()}} {{Str::plural('post', $posts->count())}}
                    and recieved {{$user->recievedLikes->count()}} Likes
                   
                </p>
            </div>
           <div class="bg-white p-6 rounded-lg mt-2 shadow">
                    @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
                    {{$posts->links()}}
                    @else
                        <p>{{$user->name}} Does not have any posts</p>
                    @endif
           </div>
        </div>
    </div>
@endsection
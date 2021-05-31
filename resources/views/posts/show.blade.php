@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-2 shadow">
           <x-post :post="$post"/>
        </div>
    </div>
@endsection
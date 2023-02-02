@extends('layout.app')
@section('content')
<div class="container-fluid bg-1 text-center">
    <div class="container">   
      @if(session('success'))
        <div class="alert alert-danger">{{session('success')}}</div>
      @endif
      <a href="{{route("post.list")}}">Posts</a>
      <a href="{{route("user.register")}}">Register</a>
      <a href="{{route("user.login")}}">Login</a>
      <h2>User Dashboard</h2>    
      @auth   
      <div>{{ auth() -> user() -> name}}</div>
      <div>{{ Auth::user() -> email }}</div>
      <div>
        @if (auth()->user()->posts->count() > 0)
            @foreach (auth()->user()->posts as $post)
             <div>{!! $post->title !!}</div>
             <div>{!! $post->body !!}</div>
             <hr />
            @endforeach
        @endif
      </div>
      @endauth
      </div>
  </div>
@endsection
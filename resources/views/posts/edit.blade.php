@extends('layout.app')
@section('content')
  <div class="container-fluid bg-1 text-center">
    <div class="container">          
      <a href="{{route("post.list")}}">Go Back</a>
      <h2>Edit Post</h2>
      <form action="{{route("post.update", $post->id)}}" method="post" enctype="multipart/form">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">title:</label>
          <input type="title" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="body">body:</label>
          <input type="body" class="form-control" id="body" placeholder="Enter body" name="body" value="{{$post->body}}">
        </div>
        <button type="submit" class="btn btn-default">Update</button>
      </form>
      </div>
  </div>
@endsection
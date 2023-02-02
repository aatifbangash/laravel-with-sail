@extends('layout.app')
@section('content')
  <div class="container-fluid bg-1 text-center">
    <div class="container"> 
      <div>
      @include('layout.errors')         
      </div>
      <a href="{{route("post.list")}}">Go Back</a>
      <h2>Create Post</h2>
      <form action="{{route("post.store")}}" method="post" enctype="multipart/form">
        @csrf
        <div class="form-group">
          <label for="title">title:</label>
          <input type="title" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
          <label for="body">body:</label>
          <input type="body" class="form-control" id="body" placeholder="Enter body" name="body">
        </div>
        <button type="submit" class="btn btn-default">Create</button>
      </form>
      </div>
  </div>
@endsection
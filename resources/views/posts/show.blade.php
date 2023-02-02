@extends('layout.app')
@section('content')
<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <div class="container">   
      <a href="{{route("post.list")}}">Go back</a>
      <h2>List Post - ({{$post->user->email}})</h2>       
        <table class="table">
          <thead>
            <tr>
              <th>#id</th>
              <th>Title</th>
              <th>Body</th>
            </tr>
          </thead>
          <tbody>
            @if ($post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                </tr>
            @endif
          </tbody>
        </table>
      </div>
  </div>
  
@endsection
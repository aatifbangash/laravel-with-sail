@extends('layout.app')
@section('content')
<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <div class="container">   
      <a href="{{route("post.create")}}">Create Post</a>
      <h2>List Post</h2>       
        <table class="table">
          <thead>
            <tr>
              <th>#id</th>
              <th>Title</th>
              <th>Body</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                <tr>
                  <td><a href="posts/{{$post->id}}">{{$post->id}}</a></td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                  <td>
                    <form method="get" action="{{route('post.edit', $post->id)}}">
                      @csrf
                    <button type="submit" name="edit" class="btn-info">Edit</button>
                    </form> | 
                    <form method="post" action="{{route('post.destroy', $post->id)}}">
                      @method('DELETE')
                      @csrf
                      <button type="submit" name="delete" class="btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
                @endforeach
            @endif
          </tbody>
        </table>
      </div>
  </div>
  
@endsection
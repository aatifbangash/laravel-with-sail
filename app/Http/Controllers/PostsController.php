<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::latest()->get();
        return View::make("posts.index", [
            "posts" => $posts
        ]);
    }

    public function create()
    {
        return View::make("posts.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        /**
         * Add title and body to $fillable property of the Model
         */
        Post::create([
            "title" => $request->title,
            "body" => $request->body
        ]);

        // return redirect()->back();
        return redirect()->route("post.list");
    }

    public function show(Post $post)
    {
        return View::make("posts.show", [
            'post' => $post,
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return View::make("posts.edit", [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "body" => "required"
        ]);
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('post.list');
    }

    /**
     * Summary of destroy
     * @param Post $post // following is called the route Model binding
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}

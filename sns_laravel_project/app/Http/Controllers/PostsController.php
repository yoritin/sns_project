<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(PostRequest $request) {
        $post = New Post();
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->save();
        return redirect('/');
    }
}

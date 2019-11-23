<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Relationship;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index() {
        if (Auth::check()) {
            // フォローしているユーザーを取得
            $relationship = Relationship::where('user_id', Auth::id())->get()->toArray();
            // フォローしているユーザーのIDを配列で取得
            $follow = array_column($relationship, 'followed_user_id');
            $posts = Post::whereIn('user_id', $follow)->orWhere('user_id', Auth::id())->latest()->get();
        } else {
            $posts = Post::latest()->get();
        }
        return view('posts.index')->with('posts', $posts);
    }

    public function newInfo() {
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

    public function edit (Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    public function update (PostRequest $request, Post $post) {
        $post = Post::find($request->id);
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->save();
        return redirect('/');
    }

    public function destroy ($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function testuser() {
        return redirect('/');
    }
}
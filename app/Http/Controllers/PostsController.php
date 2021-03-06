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
            $posts = Post::whereIn('user_id', $follow)->orWhere('user_id', Auth::id())->latest()->paginate(15);
        } else {
            $posts = Post::latest()->paginate(15);
        }
        return view('posts.index')->with('posts', $posts);
    }

    public function newInfo() {
        $posts = Post::latest()->paginate(15);
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
        \Session::flash('flash_message', '投稿が完了しました');
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
        \Session::flash('flash_message', '投稿内容を更新しました');
        return redirect('/');
    }

    public function destroy ($id) {
        $post = Post::find($id);
        $post->delete();
        \Session::flash('flash_message', '投稿を削除しました');
        return redirect()->back();
    }

    public function testuser() {
        return redirect('/');
    }
}

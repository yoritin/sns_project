<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view('posts.index')->with('posts', $posts);
    }
}

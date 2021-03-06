<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(PostRequest $request) {
        $comment = New Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        \Session::flash('flash_message', 'コメントを投稿しました');
        return redirect()->back();
    }
}

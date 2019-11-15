<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\post;
use App\comment;

class CommentsController extends Controller
{
    public function store(Request $request) {
        $comment = New Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request) {
        $comment = New Comment();
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        return redirect()->back();
    }
}

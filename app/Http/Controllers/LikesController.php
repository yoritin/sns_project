<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikesController extends Controller
{
    public function store(Request $request) {
        $like = New Like();
        $like->user_id = Auth::id();
        $like->post_id = $request->post_id;
        $like->save();
        \Session::flash('flash_message', 'いいねしました');
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $like = Like::where('user_id', Auth::id())->where('post_id', $request->post_id);
        $like->delete();
        \Session::flash('flash_message', 'いいねを解除しました');
        return redirect()->back();
    } 
}

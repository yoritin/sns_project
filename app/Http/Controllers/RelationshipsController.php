<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relationship;
use App\User;

class RelationshipsController extends Controller
{
    public function store(Request $request) {
        $relationship = New Relationship();
        $relationship->user_id = $request->user_id;
        $relationship->followed_user_id = $request->followed_user_id;
        $relationship->save();
        \Session::flash('flash_message', 'フォローしました');
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $relationship = Relationship::where('user_id', $request->user_id)->where('followed_user_id', $request->followed_user_id);
        $relationship->delete();
        \Session::flash('flash_message', 'フォロー解除しました');
        return redirect()->back();
    }
}

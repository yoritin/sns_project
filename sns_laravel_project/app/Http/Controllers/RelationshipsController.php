<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\relationship;
use App\user;

class RelationshipsController extends Controller
{
    public function store(Request $request) {
        $relationship = New Relationship();
        $relationship->user_id = $request->user_id;
        $relationship->followed_user_id = $request->followed_user_id;
        $relationship->save();
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $relationship = Relationship::where('user_id', $request->user_id)->where('followed_user_id', $request->followed_user_id);
        $relationship->delete();
        return redirect()->back();
    }
}

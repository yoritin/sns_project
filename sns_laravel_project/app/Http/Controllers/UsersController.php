<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class UsersController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('users.index')->with('user', $user);
    }

    public function show(User $user) {
        return view('users.show')->with('user', $user);
    }

    public function edit(User $user) {
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);

        $auth = Auth::id();
        $user->save();
        return view('users.show')->with('user', $user);
    }

    public function updateProfile(Request $request, User $user) {
        $user = User::find(Auth::id());
        $user->name = $user->name;
        $user->email = $user->email;
        $user->password = $user->password;
        $user->comment = $request->comment;


        // dd($request->file('image'));
        //s3アップロード開始
        $image = $request->file('image');
        // dd($image);
        // バケットの`user-icon`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('user-icon', $image, 'public');
        // アップロードした画像のフルパスを取得
        $user->image_path = Storage::disk('s3')->url($path);
        $user->save();
        return redirect()->back();
    }
}

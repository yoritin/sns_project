<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
        \Session::flash('flash_message', 'ユーザー情報を更新しました');
        return view('users.show')->with('user', $user);
    }

    public function updateProfile(Request $request, User $user) {
        $user = User::find(Auth::id());
        $user->name = $user->name;
        $user->email = $user->email;
        $user->password = $user->password;
        $user->comment = $request->comment;

        if($request->has('image')) {
            //s3アップロード開始
            $file = $request->file('image');
            // ファイルネーム
            $name = "user-icon/".Auth::id().".jpg";
            // 画像のリサイズ
            $image = Image::make($file)
                ->fit(600, 600);
            // バケットの`user-icon`フォルダへアップロード
            $path = Storage::disk('s3')->put($name, (string) $image->encode(),'public');
            // アップロードした画像のフルパスを取得
            $user->image_path = "https://sns-project.s3-ap-northeast-1.amazonaws.com/"."$name";
        }
        $user->save();
        \Session::flash('flash_message', 'プロフィールを編集しました');
        return redirect()->back();
    }
}

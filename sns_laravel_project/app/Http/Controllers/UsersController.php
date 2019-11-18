<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        return view('users.show')->with('user', $user);
    }
}

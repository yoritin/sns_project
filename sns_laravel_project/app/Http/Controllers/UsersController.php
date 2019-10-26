<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}

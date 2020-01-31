<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return \view('users.index')->with(['users' => $users]);
    }

    public function show($userId){
        $user = User::find($userId);
        return \view('users.show')->with(['user' => $user]);
    }

    public function follow($userId){
        if (auth()->user()->id === $userId) {
            return response()->json(['success' => false], 422);
        }
        $user = auth()->user();
        $user->followers()->toggle($userId);
        return response()->json(['success' => true]);
    }

    public function followers($userId){
        $user = User::find($userId);
        return view('user.show', compact('user', 'followers'));
    }

    public function followings($userId){
        $user = User::find($userId);
        return view('user.show', compact('user', 'followings'));
    }
}

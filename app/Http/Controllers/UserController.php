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
        $user = User::find($userId);
        $user->followers()->attach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully followed the user.');
    }
}

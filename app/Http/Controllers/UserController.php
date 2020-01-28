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
        return view('home');
    }
    /**
     * Follow the user.
     *
     * @param $user
     *
     * @return RedirectResponse
     */
    public function followUser(User $user)
    {
        if (!$user) {

            return redirect()->back()->with('error', 'User does not exist.');
        }

        $user->followers()->attach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully followed the user.');
    }

    /**
     * Follow the user.
     *
     * @param $user
     *
     * @return RedirectResponse
     */
    public function unFollowUser(User $user)
    {

        if (!$user) {

            return redirect()->back()->with('error', 'User does not exist.');
        }
        $user->followers()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }

    /**
     * Show the user details page.
     * @param $user
     *
     * @return Factory|View
     */
    public function show(User $user)
    {
        $followers = $user->followers;
        $followings = $user->followings;
        return view('user.show', compact('user', 'followers' , 'followings'));
    }
}

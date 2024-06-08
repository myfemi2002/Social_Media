<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    public function follow(User $user)
    {
        Auth::user()->following()->attach($user->id);

        return redirect()->back()->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user->id);

        return redirect()->back()->with('success', 'You have unfollowed ' . $user->name);
    }
    
}

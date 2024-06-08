<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    // public function showAllFriends(){
    //     // show all friends
    //     $friends = User::orderBy('created_at', 'desc')->get();
    //     return view('user.friends.index', compact('friends'));
    // }

    
    // public function showAllFriends()
    // {
    //     // Retrieve users for the view
    //     $users = User::where('role', 'user')->get();       
    //     return view('user.friends.index', compact('users'));
    // }

    // Retrieve users excluding the authenticated user
        // $users = User::where('role', 'user')->where('id', '!=', Auth::id())->get();
            
        // return view('user.friends.index', compact('users'));
        // }


        public function showAllFriends()
        {
            // Retrieve users excluding the authenticated user
            $allUsers = User::where('role', 'user')
                            ->where('id', '!=', auth()->id())
                            ->get();

            // Separate followed and unfollowed users
            $followingUsers = $allUsers->filter(function ($user) {
                return auth()->user()->following->contains($user->id);
            });

            $unfollowingUsers = $allUsers->filter(function ($user) {
                return !auth()->user()->following->contains($user->id);
            });

            return view('user.friends.index', compact('followingUsers', 'unfollowingUsers'));
        }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FriendsRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function friends(Request $request)
    {
        $friends = $request->user()->getAcceptedFriendships();
        $pendingFriends = $request->user()->getPendingFriendships();

        return view('dashboard.friends', compact('friends', 'pendingFriends'));
    }

    public function chat()
    {
        return view('dashboard.chat');
    }

    public function profile(User $user)
    {
        return view('dashboard.profile', compact('user'));
    }

    public function notifications(Request $request)
    {   
        $notifications = $request->user()->notifications()->simplePaginate(20);
        $request->user()->unreadNotifications->markAsRead();
        
        return view('dashboard.notifications', compact('notifications'));
    }

    public function friendsRequest(Request $request, User $user)
    {
        $request->user()->befriend($user);

        $user->notify(new FriendsRequest());

        return redirect()
            ->route('dashboard.profile', ['user' => $user->id])
            ->with('success', __('Success'));
    }
}

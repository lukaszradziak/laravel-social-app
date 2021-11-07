<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function friends()
    {
        return view('dashboard.friends');
    }

    public function chat()
    {
        return view('dashboard.chat');
    }

    public function profile(User $user)
    {
        return view('dashboard.profile', compact('user'));
    }
}

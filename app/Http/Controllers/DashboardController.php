<?php

namespace App\Http\Controllers;

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
}

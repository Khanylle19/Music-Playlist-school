<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'usersCount' => User::count(),
            'playlistsCount' => Playlist::count(),
        ]);
    }
}

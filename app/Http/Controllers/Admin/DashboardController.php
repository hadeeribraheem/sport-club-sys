<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SportType;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPlayers = User::whereHas('role', function ($query) {
            $query->where('name', 'player');
        })->count();

        $activePlayers = User::whereHas('role', function ($query) {
            $query->where('name', 'player');
        })->where('status', 'active')->count();

        $totalCoaches = User::whereHas('role', function ($query) {
            $query->where('name', 'coach');
        })->count();

        $totalCaptains = User::whereHas('role', function ($query) {
            $query->where('name', 'captain');
        })->count();

        $totalTeams = Team::count();
        $sportsTypes = SportType::count();

        return view('admin.dashboard', compact(
            'totalTeams', 'totalPlayers', 'activePlayers',
            'sportsTypes', 'totalCoaches', 'totalCaptains'
        ));
    }
}

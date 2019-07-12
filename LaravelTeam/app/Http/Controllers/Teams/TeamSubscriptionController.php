<?php

namespace App\Http\Controllers\Teams;

use App\{Plan, Team};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamSubscriptionController extends Controller
{
    public function index(Team $team)
    {
        return view('teams.subscriptions.index', compact('team'));
    }
}

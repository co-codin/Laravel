<?php

namespace App\Http\Controllers\Teams;

use App\{Plan, Team};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamSubscriptionController extends Controller
{
    public function index(Team $team)
    {
        $plans = Plan::teams()->get();

        return view('teams.subscriptions.index', compact('team', 'plans'));
    }
}

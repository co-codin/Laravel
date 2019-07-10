<?php

namespace App\Http\Controllers\Teams;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        return view('teams.users.index', compact('team'));
    }

    public function store()
    {

    }
}

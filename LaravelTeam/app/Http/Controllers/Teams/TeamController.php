<?php

namespace App\Http\Controllers\Teams;

use App\Team;
use App\Teams\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $teams = $request->user()->teams;

        return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        return view('teams.show');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = $request->user();

        $team = $user->teams()->create($request->only('name'));

        $user->attachRole(Roles::$roleWhenCreatingTeam, $team->id);

        return redirect()->route('teams.index');
    }
}

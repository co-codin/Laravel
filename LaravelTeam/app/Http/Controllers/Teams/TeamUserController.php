<?php

namespace App\Http\Controllers\Teams;

use App\{Team, User};
use App\Teams\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamUserController extends Controller
{
    public function index(Team $team)
    {
        return view('teams.users.index', compact('team'));
    }

    public function store(Request $request, Team $team)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email'
        ]);

        $team->users()->syncWithoutDetaching(
            $user = User::where('email', $request->email)->first()
        );

        $user->attachRole(Roles::$roleWhenJoiningTeam, $team->id);

        return back();
    }
}

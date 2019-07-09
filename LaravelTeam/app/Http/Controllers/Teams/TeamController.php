<?php

namespace App\Http\Controllers\Teams;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        return view('teams.index');
    }

    public function show()
    {
        return view('teams.show');
    }
}

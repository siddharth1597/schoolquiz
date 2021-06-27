<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SavedQuizController;
use Illuminate\Support\Facades\Session;

class WinnerController extends Controller
{
    public function show(Request $request)
    {
        $getTeamPoints = new SavedQuizController;
        $team_points = $getTeamPoints->getTeamPoints();
        $winner = array_keys($team_points, max($team_points));
        $team_name = 'Team-' . $winner[0];

        Session::forget('Team_A');
        Session::forget('Team_B');
        Session::forget('Team_C');

        return view('templates.winnerPage', ['team_name' => $team_name]);
    }
}

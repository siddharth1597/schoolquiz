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
        $title = 'Quiz is Tied between';

        if ($team_points['A'] == $team_points['B'] && $team_points['B'] > $team_points['C']) {
            $team_name = 'Team-A and Team-B';
        }
        elseif ($team_points['A'] == $team_points['C'] && $team_points['C'] > $team_points['B']) {
            $team_name = 'Team-A and Team-C';
        }
        elseif ($team_points['B'] == $team_points['C'] && $team_points['C'] > $team_points['A']) {
            $team_name = 'Team-B and Team-C';
        }
        elseif ($team_points['A'] == $team_points['B'] && $team_points['B'] == $team_points['C']) {
            $team_name = 'Team-A, Team-B and Team-C';
        }
        else {
            $winner = array_keys($team_points, max($team_points));
            $team_name = 'Team-' . $winner[0];
            $title = 'The Winner is';
        }

        Session::forget('Team_A');
        Session::forget('Team_B');
        Session::forget('Team_C');

        return view('templates.winnerPage', [
            'team_name' => $team_name,
            'title' => $title
        ]);
    }
}

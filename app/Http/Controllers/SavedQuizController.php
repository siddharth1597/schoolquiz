<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\quiz_create;

class SavedQuizController extends Controller
{
    public function showAnimation(Request $request)
    {
        return view('templates.StartQuizAnimation', ['set_no' => $request->set_no]);
    }

    public function showQuiz(Request $request) 
    {
        $quiz_set_no = $request->set_no;

        // initialize teams point.
        Session::put('Team_A', 0);
        Session::put('Team_B', 0);
        Session::put('Team_C', 0);

        return view('templates.savedSet', ['quiz_set_no' => $quiz_set_no]);
    }

    public function getQuestions(Request $request)
    {
        $set_no = $request->set_no;
        $question_no = $request->question_no;
        $team = $this->getTeamId($question_no);

        Session::put('current_question_no', $question_no);
        Session::put('set_no', $set_no);

        $saved_quiz = quiz_create::where([
            'question_no' => $question_no,
            'set_no' => $set_no
        ])->get();

        if ($saved_quiz->isEmpty()) {
            $saved_quiz[0] = '';
        }
        else {
            Session::put('question_media', $saved_quiz[0]->media_file);
        }

        return response()->json([
            'success' => 'yes',
            'saved_question' => $saved_quiz[0],
            'team' => $team,
            'question' => $question_no,
        ]);
    }

    public function submitAnswers(Request $request)
    {
        $answer = $request->answer;
        $set_no = Session::get('set_no');
        $team = $request->team;
        $question_no = $request->question_no;
        $next_question = $question_no + 1;
        $next_team = $this->getTeamId($next_question);

        $get_answer = quiz_create::select('answer')
            ->where([
                'question_no' => $question_no,
                'set_no' => $set_no
            ])->get();

        if ($get_answer[0]->answer == $answer) {
            $this->saveTeamPoints($team);
            $status = 'matched';
        }
        else {
            $status = 'unmatched';
        }
        $team_points = $this->getTeamPoints();

        return response()->json([
            'status' => $status,
            'next_question' => $next_question,
            'next_team' => $next_team,
            'team_points' => $team_points
        ]);

    }

    // get the team code by question_no
    public function getTeamId($question_no) {
        $team = '';
        for ($i = 1 ; $i <= 3 ; $i++) {
            for ($question = $i ; $question <= 30 ; $question = $question + 3) {
                if ($question == $question_no) {
                    if ($i == 1) {
                        $team = 'A';
                    }
                    elseif ($i == 2) {
                        $team = 'B';
                    }
                    elseif ($i == 3) {
                        $team = 'C';
                    }
                }
            }
        }
        return $team;
    }

    public function getTeamPoints() {
        $team_points = [];
        $team_points['A'] = Session::get('Team_A');
        $team_points['B'] = Session::get('Team_B');
        $team_points['C'] = Session::get('Team_C');
        return $team_points;
    }

    public function saveTeamPoints($team)
    {
        $point_rate = 10; // 1 right question = 10 points.
        $team_code = 'Team_' . $team;

        if (Session::has($team_code)) {
            $points = Session::get($team_code) + (1 * $point_rate);
            Session::put($team_code, $points);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\quiz_set;
use App\Models\quiz_create;

class SavedQuizController extends Controller
{
    public function showQuiz(Request $request) 
    {
        $quiz_set_no = $request->set_no;

        return view('templates.savedSet', ['quiz_set_no' => $quiz_set_no]);
    }

    public function getQuestions(Request $request)
    {
        $set_no = $request->set_no;
        $question_no = $request->question_no;

        Session::put('next_question_no', $question_no);
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
            'saved_question' => $saved_quiz[0]
        ]);
    }

    public function getTeamId($question_no) {
        // gives you the team code
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
}

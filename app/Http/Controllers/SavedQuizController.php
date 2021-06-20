<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavedQuizController extends Controller
{
    public function showQuiz(Request $request) {

        $quiz_set_no = $request->set_no;

        return view('templates.savedSet', ['quiz_set_no' => $quiz_set_no]);
    }
}

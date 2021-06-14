<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\quiz_set;
use App\Models\quiz_create;
use Illuminate\Http\Request;

class UpdateQuizController extends Controller
{
    public function showQuiz(Request $request) {
        
        if (isset(Auth::user()->id)) {            
            Session::forget('next_question_no');
            Session::put('set_no', $request->set_no);
            
            $quiz_create = quiz_create::select('*')
                ->where([
                    'set_no' => $request->set_no,
                    'question_no' => 1
                ])->get();

            return view('templates.updateSet', ['quiz_question' => $quiz_create[0]]);
        }
        return redirect('error_not_login');
    }
}

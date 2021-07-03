<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\quiz_set;
use App\Models\quiz_create;
use Illuminate\Http\Request;

class CreateQuizController extends Controller
{
    public function show(Request $request)
    {
        if (isset(Auth::user()->id)) {            
            Session::forget('next_question_no');
            Session::put('set_no', $request->set_no);
            return view('templates.createSet', [
                'quiz_set_no' => $request->set_no
            ]);
        }
        return redirect('error_not_login');
    }

    public function saveQuestion(Request $request)
    {

        $edit_type = '';
        $fileNameToStore = '';
        $validation = Validator::make($request->all(), [
            'media_file' => 'nullable|mimes:png,jpg,jpeg,gif|max:5000'
        ]);
        if ($validation->passes()) {

            if (Session::has('next_question_no')) {
                $session_question = Session::get('next_question_no');
                $session_set = Session::get('set_no');
            }
            else {
                $session_question = false;
                $session_set = false;
            }

            $question_no = $request->question_no;
            $set_no = $request->set_no;

            if ($set_no == $session_set || $session_set == false) {
                if ($question_no == $session_question || $session_question == false) {

                    $quiz_check = quiz_create::where([
                        'question_no' => $question_no,
                        'set_no' => $set_no
                    ])->exists();

                    $media_file = '';
                    if ($request->media_file != '') {
                        $path = public_path() . '/uploads/Quiz_Media';
                        if (!File::exists($path)) {
                            File::makeDirectory($path, $mode = 0777, true, true);
                        }

                        $extension = $request->file('media_file')->getClientOriginalExtension();
                        $filename = 'Media_s' . $set_no . '_q' . $question_no;
                        $fileNameToStore = $filename . '.' . $extension;

                        $request->file('media_file')->move(public_path('uploads/Quiz_Media'), $fileNameToStore);
                        $media_file =  '/uploads/Quiz_Media/' . $fileNameToStore;
                    }
                    else {
                        $media_file = Session::has('question_media') ? Session::get('question_media') : '';
                    }

                    if ($quiz_check != 1) {

                        $quiz_create = new quiz_create();
                        $quiz_create->set_no = $set_no;
                        $quiz_create->question_no = $question_no;
                        $quiz_create->question = $request->question;
                        $quiz_create->option1 = $request->option1;
                        $quiz_create->option2 = $request->option2;
                        $quiz_create->option3 = $request->option3;
                        $quiz_create->option4 = $request->option4;
                        $quiz_create->answer = $request->answer;
                        $quiz_create->media_file = $media_file;
                        $quiz_create->save();

                        // only for create quiz
                        if ($request->config_type == 'create') {
                            //In progress quiz  - by default set = 0
                            $set = quiz_set::where('set_no', 0)->count();
                            if ($set == 0) {
                                $quiz_set = new quiz_set();
                                $quiz_set->set_no = 0;
                                $quiz_set->save();
                            }

                            if ($question_no == 30) {
                                $quiz_set = new quiz_set();
                                $quiz_set->set_no = $set_no;
                                $quiz_set->save(); // save original set no

                                quiz_set::where('set_no', 0)->delete(); // delete temporary set = 0
                            }
                        }
                        $edit_type = ' created ';
                    }
                    else {
                        $quiz_create_update = quiz_create::where([
                            'question_no'=> $question_no,
                            'set_no' => $set_no,
                        ])->update([
                            'question' => $request->question,
                            'option1' => $request->option1,
                            'option2' => $request->option2,
                            'option3' => $request->option3,
                            'option4' => $request->option4,
                            'answer' => $request->answer,
                            'media_file' => $media_file,
                        ]);
                        $edit_type = ' updated ';
                    }
                    Session::forget('question_media');
                }
                else {
                    return response()->json([
                        'message' => 'Condition unmatched',
                    ]);    
                }
            }
            else {
                return response()->json([
                    'message' => 'Something went wrong',
                ]);
            }
        }
        else {
            return response()->json([
                'success' => 'no',
                'message' => $validation->errors()->all(),
            ]);
        }

        if ($question_no < 30) {
            Session::put('next_question_no', $question_no + 1);
            Session::put('set_no', $set_no);
        }
        else {
            Session::forget('next_question_no');
            Session::forget('set_no');
            Session::flash('flash_message', 'Quiz Set-' . $set_no . ' is' . $edit_type . 'successfully.');
            Session::flash('flash_type', 'alert-success');
        }

        return response()->json([
            'success' => 'yes',
            'next_question_no' => $question_no + 1
        ]);
    }

    public function storedQuestion(Request $request)
    {
        $question_no = $request->question_no;
        $set_no = $request->set_no;

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
}

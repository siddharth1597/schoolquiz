<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact_us;
use App\Models\quiz_set;
use App\Models\quiz_create;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function showDetails() {
        
        Session::forget('next_question_no');
        Session::forget('set_no');

        $quiz_set = quiz_set::where('set_no', '!=', 0)->get();
        if ($quiz_set->isEmpty()) {
            $quiz_no = 1;
        }
        else {
            $quiz_no = $quiz_set->count() + 1;
        }

        $contacts = contact_us::all();
        return view('dashboard',[
            'contacts' => $contacts[0],
            'quiz_no' => $quiz_no,
            'quiz_sets' => $quiz_set
        ]);
    }

    public function deleteQuizSet(Request $request)
    {
        $quiz_delete = quiz_create::where('set_no', $request->set_no)->delete();
        $quiz_delete = quiz_set::where('set_no', $request->set_no)->delete();

        Session::flash('flash_message', 'Deleted successfully.');
        Session::flash('flash_type', 'alert-success');

        return response()->json(['success' => 'yes']);
    }
}

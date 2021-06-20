<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quiz_set;

class HomeController extends Controller
{
    public function show() {
        $quiz_set = quiz_set::where('set_no', '!=', 0)->get();

        return view('templates.home',[
            'quiz_sets' => $quiz_set
        ]);
    }
}

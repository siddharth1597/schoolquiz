<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact_us;

class DashboardController extends Controller
{
    public function showDetails() {

        $contacts = contact_us::all();
        return view('dashboard',[
            'contacts' => $contacts[0]
        ]);
    }
}

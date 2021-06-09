<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\contact_us;

class ContactUsController extends Controller
{
    public function saveContactData(Request $request) {

        if (isset(Auth::user()->id)) {
            $contact = contact_us::all();

            if(!empty($contact[0]->id) && isset($contact[0]->id)) {
                $this->updateValues($request);
            }
            else {
                $this->createValues($request);
            }

            Session::flash('flash_message', 'Updated successfully.');
            Session::flash('flash_type', 'alert-success');

            return response()->json(['success' => 'yes']);
        }
        else {
            return response()->json(['failed' => 'yes']);
        }
    }

    public function updateValues($request) {
        
        $update = contact_us::where('role', 'admin')
            ->update([
                'title' => $request->title,
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'whatsapp_no' => $request->whatsapp_no,
                'phone_no' => $request->phone_no,
                'home_icon' => Session::get('icon'),
                'profile_image' => Session::get('profile_image')
            ]);
    }
    
    public function createValues($request) {
        $contact = new contact_us();
        $contact->role = 'admin';
        $contact->title = $request->title;
        $contact->name = $request->name;
        $contact->designation = $request->designation;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->pincode = $request->pincode;
        $contact->whatsapp_no = $request->whatsapp_no;
        $contact->phone_no = $request->phone_no;
        $contact->home_icon = Session::get('icon');
        $contact->profile_image = Session::get('profile_image');
        $contact->save();
    }

    public function uploadFile(Request $request) {

    }
}

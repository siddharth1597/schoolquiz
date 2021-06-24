<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\contact_us;

class ContactUsController extends Controller
{
  public function show() {
    return view('templates.contactUsPage');
  }

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
      $contact->home_icon = '/uploads/Contact_us/' . Session::get('icon');
      $contact->profile_image = '/uploads/Contact_us/' . Session::get('profile_image');
      $contact->save();
  }

  public function uploadFile(Request $request) {
      
      $secure_no = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 6);
  
      if ($request->image_type == 'icon') {
          $type = 'icon_' . $secure_no;
      } 
      else {
          $type = 'profile_' . $secure_no;
      }
  
      $form_file = 'image';
      $validation = Validator::make($request->all(), [
        $form_file => 'required|mimes:png,jpg,jpeg|max:2048'
      ]);
  
      if ($validation->validate()) {
        $file = $request->file($form_file);
        $new_name = $type . '.' . $file->getClientOriginalExtension();

        $path = public_path() . '/uploads/Contact_us';
  
        if (!File::exists($path)) {
          File::makeDirectory($path, $mode = 0777, true, true);
        }
        $file->move(public_path('uploads/Contact_us'), $new_name);

        if ($request->image_type == 'icon') {
          Session::put('icon', $new_name);
        }
        else {
          Session::put('profile_image', $new_name);
        }
        
        return response()->json([
          'message' => 'Image Uploaded Successfully',
          'class_name' => 'text-success',
          'image_url' => '/uploads/Contact_us/' . $new_name
        ]);
      } 
      else {
        return response()->json([
          'message'   => $validation->errors()->all(),
          'class_name'  => 'text-danger'
        ]);
      }
  }
}

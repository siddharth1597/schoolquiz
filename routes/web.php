<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('templates.WelcomeScreen');
});

Route::get('/home', function () {
    return view('templates.home');
})->name('home');

Route::get('/dashboard/createQuizSet', function () {
    return view('templates.createSet');
})->name('createQuizSet');

Route::get('/dashboard/updateQuizSet', function () {
    return view('templates.updateSet');
})->name('updateQuizSet');

Route::post('/dashboard/contact', 'App\Http\Controllers\ContactUsController@saveContactData');
Route::post('imageUpload', 'App\Http\Controllers\ContactUsController@uploadFile');

// For admin only

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\DashboardController@showDetails')->name('dashboard');

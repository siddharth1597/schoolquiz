<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('optimize');
    Session::flash('flash_message', 'Caches Cleared!');
    Session::flash('flash_type', 'alert-success');
    return redirect()->back();
})->name('clear.cache');

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', function () {
        return view('templates.WelcomeScreen');
    });

    // Homepage
    Route::get('/home', 'App\Http\Controllers\HomeController@show')->name('home');

    // Error page
    Route::get('/error_not_login', function () {
        return view('error_not_login');
    })->name('error_not_login');

    // For admin only
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\DashboardController@showDetails')->name('dashboard');

    // Contact-us
    Route::post('/dashboard/contact', 'App\Http\Controllers\ContactUsController@saveContactData');
    Route::post('imageUpload', 'App\Http\Controllers\ContactUsController@uploadFile');

    // Create Quiz
    Route::get('/dashboard/createQuizSet/set_no={set_no}', 'App\Http\Controllers\CreateQuizController@show')->name('createQuizSet');
    Route::post('/saveQuestion', 'App\Http\Controllers\CreateQuizController@saveQuestion');
    Route::post('/storedQuestion', 'App\Http\Controllers\CreateQuizController@storedQuestion');

    //Delete Quiz
    Route::post('/deleteQuiz', 'App\Http\Controllers\DashboardController@deleteQuizSet');

    //Update Quiz
    Route::get('/dashboard/updateQuizSet/set_no={set_no}', 'App\Http\Controllers\UpdateQuizController@showQuiz')->name('updateQuizSet');

    //Saved Quiz
    Route::get('/home/savedQuizSet/set_no={set_no}', 'App\Http\Controllers\SavedQuizController@showQuiz')->name('savedQuizSet');

});

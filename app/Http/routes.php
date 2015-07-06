<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'MeetingController@index');
Route::resource('meeting','MeetingController');
Route::get('/mymeetings', 'MeetingController@indexOwnMeetings');

Route::group(['middleware' => ['auth']], function(){
    Route::get('login', function () {
        redirect()->action('MeetingController@index');
    });
    Route::resource('meeting', 'MeetingController', ['only' => ['create', 'store', 'update', 'destroy', 'edit']]);
});

Route::get('/logout', function() {
    \Auth::logout();
    \Cas::logout(['service' => url('/')]);
    redirect()->action('MeetingController@index');
});


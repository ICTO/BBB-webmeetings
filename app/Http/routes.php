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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]], function() {

    Route::get('/', 'MeetingController@index');
    Route::resource('meeting','MeetingController');

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/mymeetings', 'MeetingController@indexOwnMeetings');
        Route::get('/login', 'MeetingController@index');
        Route::resource('meeting', 'MeetingController', ['only' => ['create', 'edit']]);
        Route::get('/meeting/{meeting}/delete', 'MeetingController@delete');
    });

    Route::get('/logout', 'UserController@logout');
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('meeting', 'MeetingController', ['only' => ['store', 'update', 'destroy']]);
});

Route::post('/meeting/{meeting}/join', 'MeetingController@join');
Route::get('/api/listmeetings', 'MeetingController@apiIndex');
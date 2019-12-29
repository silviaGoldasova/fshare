<?php

use Illuminate\Routing\Route;

Route::group(['middleware' => ['web']], function() {

    Route::get('/', function() {
        return view('welcome');
    });

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);
});

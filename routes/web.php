<?php

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
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return view('laravel_welcome_page');
});

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogOut',
    'as' => 'logout'
]);

Route::get('/dashboard', [
    'uses' => 'OfferController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createoffer', [
    'uses' => 'OfferController@offerCreateOffer',
    'as' => 'offer.create',
    'middleware' => 'auth'
]);

Route::get('/deleteoffer/{offer_id}', [
    'uses' => 'OfferController@getDeleteOffer',
    'as' => 'offer.delete',
    'middleware' => 'auth'
]);

/*Route::post('/signup', function() {
    echo "Hello World";
})->name("signup");*/




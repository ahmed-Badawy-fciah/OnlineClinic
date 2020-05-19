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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/control', 'HomeController@control');
Route::get('/booking', 'HomeController@booking');
// Route::get('/appointments', 'HomeController@appointments');
Route::get('/about', 'HomeController@about');
Route::get('/connect_us', 'HomeController@connect_us');


Route::get('/appointments', 'AppointmentsController@index');
Route::post('/appointments', 'AppointmentsController@store');
Route::delete('/appointments/{appointment}', 'AppointmentsController@destroy');

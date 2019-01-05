<?php

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


Route::post('/screen_one', 'formSubmitController@formSubmitted');

Route::get('/screen_one', function () {
	return view('screen_one');
});




Route::get('/', function () {
    return view('welcome');
});
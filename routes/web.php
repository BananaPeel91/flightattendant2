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

Route::get('/', 'JobController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('jobs', 'JobController@index');

Route::post('jobs', 'JobController@index');

Route::get('jobs/create', 'JobController@create');

Route::post('jobs/create', 'JobController@store');

Route::get('jobs/{job}', 'JobController@show');

Route::get('attendants', 'AttendantController@index');

Route::get('users/{user}', 'UserController@show');

Route::get('users/{user}/edit', 'UserController@edit');

Route::post('users/update', 'UserController@update');

Route::post('users/{user}/upload', 'UserController@upload');

Route::get('operators', 'OperatorController@index');

Route::get('operators/{operator}', 'OperatorController@show');

Route::post('chooseoperator', 'UserController@chooseoperator');

Route::get('vuetest', function(){ return View::make('vuetest'); });

Route::post('jobs/confirmation', 'JobController@confirmation');

Route::post('jobs/apply', 'JobController@apply');
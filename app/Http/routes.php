<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'RegisterController@index');
Route::post('/', 'RegisterController@auth');
Route::get('/admin', 'AdminController@index');
Route::post('/admin', 'AdminController@auth');

Route::group(['middleware' => 'userauth'], function () {
	Route::get('/dashboard', 'RegisterController@dashboard');
	Route::get('/register', 'RegisterController@register');
	Route::post('/register', 'RegisterController@register_back');
	Route::get('/logout','RegisterController@logout');
});

Route::group(['middleware' => 'adminauth'], function() {
	Route::get('/admin/{team}', 'AdminController@dashboard');
	Route::get('/admin/{team}/all', 'AdminController@show');
	Route::get('/admin/{team}/new', 'AdminController@showNew');
	Route::get('/admin/{team}/approved', 'AdminController@showApproved');
	Route::get('/admin/{team}/rejected', 'AdminController@showRejected');
	Route::get('/admin/{team}/approve/{id}', 'AdminController@approve');
	Route::get('/admin/{team}/reject/{id}', 'AdminController@reject');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

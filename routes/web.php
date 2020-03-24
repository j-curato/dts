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

Route::get('/', function(){
	return Redirect::to('login');
});




Auth::routes();

Route::get('/', function(){
	return Redirect::to('login');
});

 Route::get('/', 'AuthController@index');
 Route::post('post-login', 'AuthController@postLogin'); 
 Route::get('registration', 'AuthController@registration');
 Route::post('post-registration', 'AuthController@postRegistration'); 


 Auth::routes();

 Route::group(['middleware' => ['PreventButton']], function(){
 Route::resource('parAjax', 'ParController');
 Route::get('logout', 'AuthController@logout');
 Route::resource('userAjax', 'userController');
 Route::get('sweetalert/{type}','SweetalertController@notification');

 });

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

Route::get('/test',function(){var_dump(\Auth::user());});


Route::get('/doc/{doc}',"DocController@showdoc");
Route::get('/doc/{doc}/{chapter}',"DocController@show");

Route::get('/login',function(){return view("passport/login");});
Route::get('/register',function(){return view("passport/register");});
Route::get('/resetpass',function(){return view("passport/resetpass");});
Route::get('/active/account',"UserController@activeEmail");
Route::get('/active/resetpassword',"UserController@activeResetPassword");


Route::post('/login',"UserController@loginPost");
Route::post('/register',"UserController@regiestPost");
Route::post('/setLoginPass',"UserController@setLoginPass");
Route::post('/resetPassEmail',"UserController@resetPassEmail");



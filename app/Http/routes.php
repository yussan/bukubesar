<?php
// ROOT
Route::get('/', 'WelcomeController@index');
//AJAX FOR PUBLIC
Route::post('ajax/loginverification','AjaxController@loginverification');//login verification
Route::post('ajax/setsession','AjaxController@setsession');//set session
//AJAX FOR MEMBER

//AJAX FOR ADMIN

//PAGE FOR PUBLIC
Route::get('dashboard','DashboardController@index');
Route::get('logout',function()
{
	Session::forget('userlogin');return redirect('/');
});
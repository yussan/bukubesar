<?php
#ROOT
Route::get('/', 'WelcomeController@index');
#AJAX FOR PUBLIC
Route::post('ajax/loginverification','AjaxController@loginverification');//login verification
Route::post('ajax/setsession','AjaxController@setsession');//set session
#AJAX FOR MEMBER

#AJAX FOR ADMIN

#PAGE FOR PUBLIC
#PAGE FOR MEMBER
//dashboard
Route::get('dashboard','DashboardController@index');
//dashboard usaha
Route::get('dashboard/usaha/{encidusaha}','DashboardController@usaha');
Route::get('logout',function()
{
	Session::forget('userlogin');return redirect('/');
});
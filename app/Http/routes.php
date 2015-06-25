<?php
#ROOT
Route::get('/', 'WelcomeController@index');
#AJAX FOR PUBLIC
//member profile page
Route::group(['prefix' => 'accounts/{username}'], function()
{
    Route::get('profile', function($username)
    {
        //available soon
    });
});
Route::post('ajax/loginverification','AjaxController@loginverification');//login verification
Route::post('ajax/setsession','AjaxController@setsession');//set session
#AJAX FOR MEMBER
Route::post('ajax/personil/activities','AjaxController@personilActivities');//set session
Route::post('ajax/personil/list','AjaxController@personilList');//set session
Route::get('ajax/personil/search','AjaxController@personilSearch');//set session
Route::post('ajax/personil/showbagian','AjaxController@personilBagian');//show modal untuk set bagian
Route::post('ajax/personil/ubahstatus','AjaxController@personilBagian');//ubah status personil

#AJAX FOR ADMIN

#PAGE FOR PUBLIC

#PAGE FOR MEMBER
//dashboard
Route::get('dashboard','DashboardController@index');
//dashboard usaha
Route::get('dashboard/usaha/{encidusaha}','DashboardController@usaha');
Route::get('dashboard/usaha/penjualan/{encidusaha}','DashboardController@penjualan');
Route::get('dashboard/usaha/persediaan/{encidusaha}','DashboardController@persediaan');
Route::get('dashboard/usaha/akuntansi/{encidusaha}','DashboardController@akuntansi');
Route::get('dashboard/usaha/personil/{encidusaha}','DashboardController@personil');
Route::get('logout',function()//remove user login session
{
	Session::forget('userlogin');return redirect('/');
});
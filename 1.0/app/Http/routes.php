<?php
//CLEAR penjualan-persediaan-akuntansi
if(Session::has('loginPenjualan'))Session::forget('userPogin');
if(Session::has('loginPersediaan'))Session::forget('loginPersediaan');
if(Session::has('loginAkuntansi'))Session::forget('loginAkuntansi');
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
// Route::post('ajax/{segment}/{action}',function($segment,$action,$uses)
// 	{
// 		switch ($segment) {
// 			case 'persediaan':
// 				switch ($action) {
// 					case 'list':
// 						$uses = 'AjaxController@persediaanList';
// 						break;
// 					default:
// 						abort(404);
// 						break;
// 				}
// 				break;
// 			default:
// 				abort(404);
// 				break;
// 		}
// 	});
//password checker
//PHP API
Route::post('ajax/security/passwordchecker','AjaxController@checkPassword');//check password when go to secure page
Route::post('ajax/loginverification','AjaxController@loginverification');//login verification
Route::post('ajax/setsession','AjaxController@setsession');//set session
#AJAX FOR HOME
Route::post('ajax/addmail','AjaxController@addMail');//add mailist
#AJAX FOR PERSONIL
Route::post('ajax/personil/activities','AjaxController@personilActivities');//set session
Route::post('ajax/personil/list','AjaxController@personilList');//set session
Route::get('ajax/personil/search','AjaxController@personilSearch');//set session
Route::post('ajax/personil/showbagian','AjaxController@personilBagian');//show modal untuk set bagian
Route::post('ajax/personil/ubahstatus','AjaxController@personilBagian');//ubah status personil
#AJAX FOR PERSEDIAAN
Route::post('ajax/persediaan/item','AjaxController@persediaanItem');//get detail item, by idItem
Route::post('ajax/persediaan/list','AjaxController@persediaanList');//get list item
Route::post('ajax/persediaan/addTags','AjaxController@persediaanAddTags');//add tags
Route::post('ajax/persediaan/getTags','AjaxController@persediaanGetTags');//get latest tags
Route::post('ajax/persediaan/search','AjaxController@persediaanSearch');//search item
Route::post('ajax/persediaan/processItem','AjaxController@persediaanProcItem');//CRUD an item
Route::put('ajax/persediaan/additem','AjaxController@persediaanAddItem');//add new item
Route::patch('ajax/persediaan/updateitem','AjaxController@persediaanUpdateitem');//update an item
#AJAX FOR ADMIN

#PAGE FOR PUBLIC

#PAGE FOR MEMBER
//dashboard
Route::get('dashboard','DashboardController@index');
//dashboard usaha
Route::get('dashboard/usaha/{encidusaha}','DashboardController@usaha');
//dashboard penjualan
Route::get('dashboard/usaha/penjualan/{encidusaha}','DashboardController@penjualan');
//dashboard pensediaan
Route::get('dashboard/usaha/persediaan/{encidusaha}','DashboardController@persediaan');
//dashboard akuntansi
Route::get('dashboard/usaha/akuntansi/{encidusaha}','DashboardController@akuntansi');
//dashboard personil
Route::get('dashboard/usaha/personil/{encidusaha}','DashboardController@personil');
Route::get('logout',function()//remove user login session
{
	Session::forget('userlogin');return redirect('/');
});

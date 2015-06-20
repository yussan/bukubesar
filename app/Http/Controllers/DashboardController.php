<?php 
namespace App\Http\Controllers;
use Session;
class DashboardController extends BaseController {
	public function __construct()
	{
		parent::__construct();
	}
	#INDEX PAGE - NOTIFICATION - STATS
	public function index()
	{
		//user not logged in
		if(Session::has('userlogin')==false){return redirect('/');}
		$Data = array(
			'title'=>'Dashboard',
			);
		return $this->baseView('dashboard.index',$Data);
	}
}

<?php 
namespace App\Http\Controllers;
use DB;use Session;
use App\Models\User;use App\Models\Usaha;use App\Models\Item;use App\Models\Personil;
class AjaxController extends BaseController {
	public function __construct()
	{
		parent::__construct();
		
	}
	//LOGIN VERIFICATION
	public function loginverification()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $username = $data->username;$password = $data->password;
		// print_r($data);
		//user checker
        $query = DB::table('user')->where('username','=',$username)
			->where('password','=',$password)->get();
		//is user found
		if($query){return 1;}else{return 0;}
	}
	//SET SESSION
	public function setsession()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $username = $data->username;$password = $data->password;
		// print_r($data);
		//user checker
        $query = DB::table('user')->where('username','=',$username)
			->where('password','=',$password)->get();
		//is user found
		if($query){
			//start set session
			Session::put('userlogin', $query);
		}else{return 0;}
	}
	//PENJUALAN

	//PERSEDIAAN

	//PERSONIL
	#PERSONIL LIST
	public function personilList()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $idusaha = $data->idusaha;
		//get list
		if(empty($_GET['status']))$_GET['status']='';
		$personil = $this->M_personil->getPersonil($idusaha,$_GET['status']);
		//get json for ajax
		if(!empty($_GET['type']))
		{
			switch ($_GET['type']) {
				case 'json':
					$json = json_encode($personil);
					break;
			}
			return $json;
		}
	}
	#PERSONIL SEARCH
	public function personilSearch()
	{
		$username = $_GET['q'];
		if(empty($username)):
			return '[]';
		else:
			$personil = $this->M_personil->searchPersonil($username);
			return json_encode($personil);
		endif;
	}
	#PERSONIL ACTIVIES
	public function personilActivities()
	{

		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $idpersonil = $data->idpersonil;
        $activities = DB::table('personil')
        	->where('idPersonil','=',$idpersonil)
        	->select('activitiesPersonil')
        	->get();
        $activities = $activities[0]->activitiesPersonil;
        return $activities;
	}

	//AKUNTANSI
}

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
	//PASSWORD CHECKER
	public function checkPassword()
	{
		return 1;//return true else {..}
	}
	/***HOME***/
	public function addMail()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $email = trim($data->email);
        $exist = DB::table('mailist')->where('email','=',$email)->get();
        if(count($exist)<=0):
        	//insert data
        	DB::table('mailist')
			->insert(
				['addDate'=>date('Y-m-d H:i:s'),'email'=>$email]
				);
        	return 'success';
    	else:
        	return 'email sudah tercatat';
		endif;
	}
	/***PENJUALAN***/
	/***PERSEDIAAN***/
	#PERSEDIAAN LIST
	public function persediaanList()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $idusaha = $data->idusaha;
        $tag = $data->tag;
        $item = $this->M_persediaan->getItems($idusaha,$tag);
        return json_encode($item);
	}
	#PERSEDIAAN SEARCH
	public function persediaanSearch()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $idusaha = $data->idusaha;
        $keyword = $data->keyword;
        $item = $this->M_persediaan->searchItems($idusaha,$keyword);
        return json_encode($item);
	}
	#GET TAGS
	public function persediaanGetTags()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $idusaha = $data->idusaha;
        $query = DB::table('persediaanTags')
        	->where('idUsaha',$idusaha)
        	->get();
        $tags = explode(',',$query[0]->tags);
        return json_encode($tags);
	}
	#ADD TAGS
	public function persediaanAddTags()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $tags = $data->tags;
        $idusaha = $data->idusaha;
        //update database
        return DB::table('persediaanTags')
        	->where('idUsaha',$idusaha)
        	->update(['tags'=>$tags]);
	}

	/***PERSONIL***/
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
	#SHOW BAGIAN PERSONIL
	public function personilBagian()
	{
		$postdata = file_get_contents("php://input");
        $data = json_decode($postdata);
        $idusaha = $data->idusaha;
		$iduser = $data->iduser;
		switch ($_GET['act']) {
			case 'show':
				//get button view
				$status = array('penjualan','persediaan','akuntansi');
				$icon = array('glyphicon-shopping-cart','glyphicon-list-alt','glyphicon-stats');//glyphicon
				$class = array();
				//check is my personil
				echo '<div class="text-center col-md-12 personil-bagian"><div ng-hide="loader" class="alert alert-warning">loading...</div>';
				for($i=0;$i<3;$i++)
				{
					$personilstatus = $this->M_personil->cekStatus($idusaha,$iduser,$status[$i]);
					if($personilstatus){$class='active';}else{$class='nonactive';}
					echo '<div class="col-md-4"><button ng-click="actionBagian('.$iduser.',\''.$status[$i].'\')" class="'.$class.' btn btn-default btn-circle"><span style="font-size:25px" class="glyphicon '.$icon[$i].'"></span></button><br/>'.$status[$i].'<br/><small>status "'.$class.'" klik untuk merubah</small></div>';
				}
				echo '</div>';
				break;
			case 'action':
				$bagian = $data->bagian;
				$sessiondata = Session::get('userlogin');
				$myid=$sessiondata[0]->idUser;
				if($iduser != $myid):
					$status = $this->M_personil->changeStatus($idusaha,$iduser,$bagian);
					if($status == true)
					{
						DB::table('personil')
							->where('personil.idusaha','=',$idusaha)
							->where('personil.iduser','=',$iduser)
							->where('personil.statusPersonil','=',$bagian)
							->delete();
					}else
					{
						DB::table('personil')
							->insert(
								['idUser'=>$iduser,'idUsaha'=>$idusaha,'statusPersonil'=>$bagian,'lastLoginPersonil'=>date('Y-m-d H:i:s'),
								'lastActivityPersonil'=>'','activitiesPersonil'=>'[]']
								);
					}
					break;
				else:
					echo 'pemilik usaha bisa akses semua bagian';
				endif;
		}
	}
	//AKUNTANSI
}

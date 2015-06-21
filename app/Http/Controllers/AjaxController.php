<?php 
namespace App\Http\Controllers;
use DB;use Session;
class AjaxController extends BaseController {
	public function __construct()
	{
		
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

}

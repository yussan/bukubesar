<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Usaha extends Model {

	#GET USAHA BY USERNAME
	public function getUsaha($username)
	{
		return DB::table('usaha')
			->join('user','user.idUser','=','usaha.idUser')
			->select('usaha.*')
			->where('user.username','=',$username)->get();
	}
	#GET DETAIL USAHA BY ID USAHA
	public function detail($idusaha)
	{
		return DB::table('usaha')
			->where('idUsaha','=',$idusaha)->get();
	}
	#GET PERSONIL
	public function getPersonil($idusaha)
	{
		return DB::table('personil')
			->join('user','user.idUser','=','personil.idUser')
			->where('personil.idUsaha','=',$idusaha)->get();//get personil by id usaha
	}

}

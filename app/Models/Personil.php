<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Personil extends Model {

	#USER DATA BY USERNAME
	public function getPersonil($idusaha,$bag="")//all personil
	{
		if(!empty($bag))//sort by bagian
		{
			return DB::table('personil')
			->join('user','user.idUser','=','personil.idUser')
			->where('personil.statusPersonil',$bag)
			->where('personil.idUsaha','=',$idusaha)->get();//get personil by id usaha
		}else//all personil
		{
			return DB::table('personil')
			->join('user','user.idUser','=','personil.idUser')
			->where('personil.idUsaha','=',$idusaha)->get();//get personil by id usaha
		}
	}
	#SEARCH PERSONIL
	public function searchPersonil($username)
	{
		return DB::table('user')
			->where('user.username','like','%'.$username.'%')
			->take(10)->get();
	}
}

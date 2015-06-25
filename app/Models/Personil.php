<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Personil extends Model {

	protected $table = 'personil';

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
	#CEK STATUS PERSONIL
	public function cekStatus($idusaha,$iduser,$status)
	{
		$query = DB::table('personil')
			->where('personil.idUser','=',$iduser)
			->where('personil.statusPersonil','=',$status)
			->where('personil.idusaha','=',$idusaha)
			->get();
		if(count($query)>0){$status = true;}
		else{$status = false;}
		//is owner?
		if($status==false):
			$query = DB::table('usaha')
				->where('idUser','=',$iduser)
				->get();
		if(count($query)>0){$status = true;}
		else{$status = false;}
		endif;
		return $status;//get lattest status
	}
	#UBAH STATUS PERSONIL
	public function changeStatus($idusaha,$iduser,$bagian)
	{
		$query = Db::table('personil')
			->where('personil.idUser','=',$iduser)
			->where('personil.idUsaha','=',$idusaha)
			->where('personil.statusPersonil','=',$bagian)
			->get();
		if(count($query)>0){$status = true;}//found -> do delete
		else{$status = false;}//not found -> do insert
		return $status;
	}
}

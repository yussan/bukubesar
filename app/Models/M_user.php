<?php
namespace App\Models;
use DB;
class M_user extends Model{
	protected $table = 'user';
	//relation
	public function usaha()
	{
		return $this->hasOne('Usaha','idUser');
	}
}
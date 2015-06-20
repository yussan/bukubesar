<?php
class M_usaha extends Model{
	protected $table = 'usaha';
	protected $primaryKey = 'idUser';
	//relation
	public function user()
	{
		return $this->belongsTo('User','idUser');
	} 
}
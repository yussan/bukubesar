<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Model {

	#USER DATA BY USERNAME
	public function userData($username)
	{
		return DB::table('user')
			->where('username','=',$username)->get();
	}

}

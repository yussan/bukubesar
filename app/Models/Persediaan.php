<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Persediaan extends Model {
	#GET ALL TAGS
	public function getTags($idusaha)
	{
		$query = DB::table('persediaanTags') 
			->where('persediaanTags.idUsaha','=',$idusaha)
			->get();
		$tagsarray = explode(',',$query[0]->tags);
		return json_encode($tagsarray);
	}
	#GET ITEMS
	public function getItems($idusaha,$tag='')
	{
		if(!empty($tag))
		{
			return DB::table('item')
				->join('persediaanTags','item.idUsaha','=','persediaanTags.idUsaha')
				->where('item.idUsaha','=',$idusaha)
				->where('item.tagItem','=',$tag)
				->get();
		}else
		{
			return DB::table('item')
				->join('persediaanTags','item.idUsaha','=','persediaanTags.idUsaha')
				->where('item.idUsaha','=',$idusaha)
				->get();
		}
	}
	#SEARCH ITEMS
	public function searchItems($idusaha,$keyword)
	{
		return DB::table('item')
				->join('persediaanTags','item.idUsaha','=','persediaanTags.idUsaha')
				->where('item.idUsaha','=',$idusaha)
				->where('item.merek','like','%'.$keyword.'%')
				->get();
	}
}

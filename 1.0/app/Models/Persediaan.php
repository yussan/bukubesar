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
	#ADD ITEM
	public function addItem($barang)
	{
		$query = DB::table('item')
			->insert($barang);
		if($query)$note = 'success';
		else $note = 'fail';
		return $note;
	}
	#UPDATE ITEM
	public function updateItem($barang,$iditem)
	{
		$query = DB::table('item')
			->where('idItem',$iditem)
			->update($barang);
		if($query) $note = 'success';
		else $note = 'error';
		return $note;
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
				->orderBy('item.idItem','DESC')
				->get();
		}else
		{
			return DB::table('item')
				->join('persediaanTags','item.idUsaha','=','persediaanTags.idUsaha')
				->where('item.idUsaha','=',$idusaha)
				->orderBy('item.idItem','DESC')
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

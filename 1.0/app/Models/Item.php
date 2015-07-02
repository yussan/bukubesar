<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model {

	#STATISTIK SEKARANG
	public function totalMerek($idusaha)
	{
		return DB::table('item')
			->where('idUsaha','=',$idusaha)
			->count();
	}
	public function totalStok($idusaha)
	{
		return DB::table('item')
			->select(DB::raw('SUM(stok) as totalstok'))
			->where('idUsaha','=',$idusaha)
			->get();
	}
	public function totalHargaJual($idusaha)
	{
		return DB::table('item')
			->select(DB::raw('SUM(hargaProduksi) as totalhp'))
			->where('idUsaha','=',$idusaha)
			->get();
	}
	public function totalHargaPenjualan($idusaha)
	{
		return DB::table('item')
			->select(DB::raw('SUM(hargaProduksi + (hargaProduksi * untung/100) - (hargaProduksi * diskon/100))
as totalhp '))
			->where('idUsaha','=',$idusaha)
			->get();
	}
}

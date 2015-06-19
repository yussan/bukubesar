<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usaha extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usaha',function($table)
			{
				$table->engine = 'InnoDB';
				$table->bigIncrements('idUsaha');
				$table->bigInteger('idUser')->unsigned();
				$table->foreign('idUser')->references('idUser')->on('user')->onDelete('cascade');
				$table->string('kategoriUsaha',50);
				$table->string('namaUsaha',200);
				$table->string('alamatUsaha',500);
				$table->string('provinsi',100);
				$table->string('kota',100);
				$table->string('kecamatan',100);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usaha');
	}
}

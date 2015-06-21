<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personil extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personil',function($table)
			{
				$table->engine = 'InnoDB';
				$table->bigIncrements('idPersonil');
				$table->bigInteger('idUser')->unsigned();
				$table->foreign('idUser')->references('idUser')->on('user')->onDelete('cascade');
				$table->bigInteger('idUsaha')->unsigned();
				$table->foreign('idUsaha')->references('idUsaha')->on('usaha')->onDelete('cascade');
				$table->enum('statusPersonil', ['penjualan', 'persediaan','akuntansi']);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personil');
	}

}

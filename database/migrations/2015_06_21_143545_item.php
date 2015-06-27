<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Item extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item',function($table)
			{
				$table->engine = 'InnoDB';
				$table->bigIncrements('idItem');
				$table->dateTime('updateItem');
				$table->bigInteger('idUsaha')->unsigned();
				$table->foreign('idUsaha')->references('idUsaha')->on('usaha')->onDelete('cascade');
				$table->string('kodeBarang',200);
				$table->string('merek',200);
				$table->string('tagItem',200);
				$table->integer('stok');
				$table->integer('hargaProduksi');
				$table->integer('untung');
				$table->integer('diskon');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item');
	}

}

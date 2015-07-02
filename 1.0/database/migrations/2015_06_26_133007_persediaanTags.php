<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersediaanTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!(Schema::hasTable('persediaanTags'))):
		Schema::create('persediaanTags',function($table)
			{
				$table->engine = 'InnoDB';
				$table->bigInteger('idUsaha')->unsigned();
				$table->string('tags','500');
			});
		endif;
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('PersediaanTags');
	}

}

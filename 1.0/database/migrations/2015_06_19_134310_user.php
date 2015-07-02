<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',function($table)
			{
			 	$table->engine = 'InnoDB';
				$table->bigIncrements('idUser');
				$table->dateTime('tglRegister');
				$table->string('username', 20)->unique();
				$table->text('password');
				$table->string('facebookId', 200)->nullable();
				$table->string('gplusId', 200)->nullable();
				$table->string('email',50)->unique()->nullable();
				$table->string('avatar',100)->nullable();
				$table->string('namaUser',100);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}

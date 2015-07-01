<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerUsaha extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::unprepared('
          CREATE TRIGGER tr_Item_Tags AFTER INSERT ON usaha FOR EACH ROW
               BEGIN
                   INSERT INTO persediaanTags (idUsaha) VALUES (new.idUsaha);
               END
               ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::unprepared('DROP TRIGGER tr_Item_Tags');
	}

}

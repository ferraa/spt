<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandasHorarias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bandas_horarias',function($table)
		{
			$table->create();
			
			$table->increments('id_banda_horaria');
			
			$table->time('desde');

			$table->time('hasta');

			$table->timestamps();
			
			$table->softDeletes();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bandas_horarias');
	}

}

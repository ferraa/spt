<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('precios',function($table)
		{
			$table->create();
			
			$table->increments('id_precio');
			
			$table->integer('cancha');

			$table->integer('dia');

			$table->integer('banda_horaria');

			$table->float('precio');

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
		Schema::drop('precios');
	}

}

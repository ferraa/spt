<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeriados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feriados',function($table)
		{
			$table->create();
			
			$table->increments('id_feriado');
			
			$table->date('fecha');
			
			$table->string('descripcion');
			
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
		Schema::drop('feriados');
	}

}

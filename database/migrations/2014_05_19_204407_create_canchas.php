<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanchas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('canchas',function($table)
		{
			$table->create();
			
			$table->increments('id_cancha');
			
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
		
		Schema::drop('canchas');	

	}

}

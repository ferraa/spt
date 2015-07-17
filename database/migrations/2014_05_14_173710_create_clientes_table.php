<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clientes', function($table)
		{
			$table->create();
			
			$table->increments('id_cliente');
			
			$table->integer('telefono')->unique();
			
			$table->string('dni');
			$table->string('nombres');
			$table->string('apellidos');
			
			$table->string('password');
			
			$table->string('email');
			
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
		Schema::drop('clientes');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reservas',function($table)
		{
			$table->create();
			
			$table->increments('id_reserva');
			
			$table->integer('cancha');

			$table->time('desde');

			$table->time('hasta');

			$table->date('fecha');

			$table->float('senia');

			$table->float('precio');

			$table->integer('cliente');

			$table->integer('usuario');

			$table->tinyInteger('pago');

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
		Schema::drop('reservas');
	}

}

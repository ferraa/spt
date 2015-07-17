<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('CategoriasSeeder');
		$this->call('ClientesSeeder');
		$this->call('CanchasSeeder');
		$this->call('DiasSeeder');
		$this->call('FeriadosSeeder');
		$this->call('BandasHorariasSeeder');
		$this->call('PreciosSeeder');
	}

}
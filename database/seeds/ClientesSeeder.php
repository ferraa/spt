<?php

class ClientesSeeder extends Seeder {

    public function run()
    {
        DB::table('clientes')->delete();

        Cliente::create(array(
			'telefono' => '1164455073',
        	'dni' => '36903680',
			'nombres' => 'Matias',
			'apellidos' => 'Ferrario',
			'password' => Hash::make('123456'),
			'email' => 'ferraa@hotmail.com')
        );

        Cliente::create(array(
            'telefono' => '1165500175',
            'dni' => '33456852',
            'nombres' => 'Sofia',
            'apellidos' => 'Ferrario',
            'password' => Hash::make('123456'),
            'email' => 'soferrario@hotmail.com')
        );
    }

}
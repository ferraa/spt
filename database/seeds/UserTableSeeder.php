<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'dni' => '36903680',
        	'nombres' => 'Matias',
        	'apellidos' => 'Ferrario',
        	'password' => Hash::make('123456'),
        	'email' => 'ferraa@hotmail.com',
        	'categoria' => '1')
        );

        User::create(array(
        	'dni' => '14026342',
        	'nombres' => 'Juan Bautista',
        	'apellidos' => 'Ferrario',
        	'password' => Hash::make('123456'),
        	'email' => 'juanferrario@fibertel.com.ar',
        	'categoria' => '3')
        );

        User::create(array(
        	'dni' => '16028480',
        	'nombres' => 'Gabriela',
        	'apellidos' => 'Chenaut',
        	'password' => Hash::make('123456'),
        	'email' => 'gchenaut@fibertel.com.ar',
        	'categoria' => '2')
        );
    }

}
<?php

class CanchasSeeder extends Seeder {

    public function run()
    {
        DB::table('canchas')->delete();

        Cancha::create(array(
        	'id_cancha' => '1',
        	'descripcion' => 'Cancha 1 (5 Jugadores)')
        );

        Cancha::create(array(
            'id_cancha' => '2',
            'descripcion' => 'Cancha 2 (5 Jugadores)')
        );

        Cancha::create(array(
            'id_cancha' => '3',
            'descripcion' => 'Cancha 3 (5 Jugadores)')
        );

        Cancha::create(array(
            'id_cancha' => '4',
            'descripcion' => 'Cancha 4 (6 Jugadores)')
        );
    }

}
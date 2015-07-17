<?php

class FeriadosSeeder extends Seeder {

    public function run()
    {
        DB::table('feriados')->delete();

        Feriado::create(array(
        	'fecha' => '2014/01/01',
        	'descripcion' => 'Año nuevo')
        );

        Feriado::create(array(
            'fecha' => '2014/05/25',
            'descripcion' => 'Dia de la Revolucion de Mayo')
        );

        Feriado::create(array(
            'fecha' => '2014/06/20',
            'descripcion' => 'Día Paso a la Inmortalidad del Gral. Manuel Belgrano')
        );

    }

}
<?php

class DiasSeeder extends Seeder {

    public function run()
    {
        DB::table('dias')->delete();

        Dia::create(array(
        	'id_dia' => '1',
        	'dia' => 'Lunes',
            'abr' => 'Lun')
        );

        Dia::create(array(
            'id_dia' => '2',
            'dia' => 'Martes',
            'abr' => 'Mar')
        );

        Dia::create(array(
            'id_dia' => '3',
            'dia' => 'Miercoles',
            'abr' => 'Mie')
        );

        Dia::create(array(
            'id_dia' => '4',
            'dia' => 'Jueves',
            'abr' => 'Jue')
        );

        Dia::create(array(
            'id_dia' => '5',
            'dia' => 'Viernes',
            'abr' => 'Vie')
        );

        Dia::create(array(
            'id_dia' => '6',
            'dia' => 'Sabado',
            'abr' => 'Sab')
        );

        Dia::create(array(
            'id_dia' => '7',
            'dia' => 'Domingo',
            'abr' => 'Dom')
        );

        Dia::create(array(
            'id_dia' => '8',
            'dia' => 'Feriado',
            'abr' => 'Feriado')
        );

       
    }

}
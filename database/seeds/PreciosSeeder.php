<?php

class PreciosSeeder extends Seeder {

    public function run()
    {
        DB::table('precios')->delete();

        Precio::create(array(
        	'cancha' => '1',
            'dia' => '1',
            'banda_horaria' => '1',
        	'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '1',
            'dia' => '1',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '2',
            'dia' => '1',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '2',
            'dia' => '1',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '3',
            'dia' => '1',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '3',
            'dia' => '1',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '4',
            'dia' => '1',
            'banda_horaria' => '1',
            'precio' => '300')
        );
        Precio::create(array(
            'cancha' => '4',
            'dia' => '1',
            'banda_horaria' => '2',
            'precio' => '450')
        );



        //Martes

        Precio::create(array(
            'cancha' => '1',
            'dia' => '2',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '1',
            'dia' => '2',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '2',
            'dia' => '2',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '2',
            'dia' => '2',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '3',
            'dia' => '2',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '3',
            'dia' => '2',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '4',
            'dia' => '2',
            'banda_horaria' => '1',
            'precio' => '300')
        );
        Precio::create(array(
            'cancha' => '4',
            'dia' => '2',
            'banda_horaria' => '2',
            'precio' => '450')
        );


        //Miercoles

        Precio::create(array(
            'cancha' => '1',
            'dia' => '3',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '1',
            'dia' => '3',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '2',
            'dia' => '3',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '2',
            'dia' => '3',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '3',
            'dia' => '3',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '3',
            'dia' => '3',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '4',
            'dia' => '3',
            'banda_horaria' => '1',
            'precio' => '300')
        );
        Precio::create(array(
            'cancha' => '4',
            'dia' => '3',
            'banda_horaria' => '2',
            'precio' => '450')
        );


        //Jueves

        Precio::create(array(
            'cancha' => '1',
            'dia' => '4',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '1',
            'dia' => '4',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '2',
            'dia' => '4',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '2',
            'dia' => '4',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '3',
            'dia' => '4',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '3',
            'dia' => '4',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '4',
            'dia' => '4',
            'banda_horaria' => '1',
            'precio' => '300')
        );
        Precio::create(array(
            'cancha' => '4',
            'dia' => '4',
            'banda_horaria' => '2',
            'precio' => '450')
        );

        //Viernes

        Precio::create(array(
            'cancha' => '1',
            'dia' => '5',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '1',
            'dia' => '5',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '2',
            'dia' => '5',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '2',
            'dia' => '5',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '3',
            'dia' => '5',
            'banda_horaria' => '1',
            'precio' => '250')
        );
        Precio::create(array(
            'cancha' => '3',
            'dia' => '5',
            'banda_horaria' => '2',
            'precio' => '380')
        );

        Precio::create(array(
            'cancha' => '4',
            'dia' => '5',
            'banda_horaria' => '1',
            'precio' => '300')
        );
        Precio::create(array(
            'cancha' => '4',
            'dia' => '5',
            'banda_horaria' => '2',
            'precio' => '450')
        );

        //Sabado

        Precio::create(array(
            'cancha' => '1',
            'dia' => '6',
            'banda_horaria' => '3',
            'precio' => '320')
        );
       

        Precio::create(array(
            'cancha' => '2',
            'dia' => '6',
            'banda_horaria' => '3',
            'precio' => '320')
        );
       

        Precio::create(array(
            'cancha' => '3',
            'dia' => '6',
            'banda_horaria' => '3',
            'precio' => '320')
        );
      
        Precio::create(array(
            'cancha' => '4',
            'dia' => '6',
            'banda_horaria' => '3',
            'precio' => '380')
        );



    //DOmingo

       Precio::create(array(
            'cancha' => '1',
            'dia' => '7',
            'banda_horaria' => '3',
            'precio' => '300')
        );
       

        Precio::create(array(
            'cancha' => '2',
            'dia' => '7',
            'banda_horaria' => '3',
            'precio' => '300')
        );
       

        Precio::create(array(
            'cancha' => '3',
            'dia' => '7',
            'banda_horaria' => '3',
            'precio' => '300')
        );
      
        Precio::create(array(
            'cancha' => '4',
            'dia' => '7',
            'banda_horaria' => '3',
            'precio' => '350')
        );

        //Feriado

       Precio::create(array(
            'cancha' => '1',
            'dia' => '8',
            'banda_horaria' => '3',
            'precio' => '300')
        );
       

        Precio::create(array(
            'cancha' => '2',
            'dia' => '8',
            'banda_horaria' => '3',
            'precio' => '300')
        );
       

        Precio::create(array(
            'cancha' => '3',
            'dia' => '8',
            'banda_horaria' => '3',
            'precio' => '300')
        );
      
        Precio::create(array(
            'cancha' => '4',
            'dia' => '8',
            'banda_horaria' => '3',
            'precio' => '350')
        );
    }

}
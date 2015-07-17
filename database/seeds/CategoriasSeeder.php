<?php

class CategoriasSeeder extends Seeder {

    public function run()
    {
        DB::table('categorias')->delete();

        Categoria::create(array('id_categoria' => '1','nombre' => 'Administrador'));
        Categoria::create(array('id_categoria' => '2','nombre' => 'Normal' ));
        Categoria::create(array('id_categoria' => '3','nombre' => 'Solo Reservas'));
    }

}
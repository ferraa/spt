<?php

class BandasHorariasSeeder extends Seeder {

    public function run()
    {
        DB::table('bandas_horarias')->delete();

        BandaHoraria::create(array(
        	'desde' => '08:00:00',
        	'hasta' => '18:00:00')
        );

        BandaHoraria::create(array(
            'desde' => '18:00:00',
            'hasta' => '00:00:00')
        );

        BandaHoraria::create(array(
            'desde' => '08:00:00',
            'hasta' => '00:00:00')
        );

        
    }

}
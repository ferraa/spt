<?php
namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use App\Models\Cancha;
use App\Models\Dia;

class Precio extends  Model{
	
	protected $primaryKey = "id_precio";
	protected $softDelete = true;
	
	
	public function dia()
    {
        return $this->hasOne('App\Models\Dia','id_dia','dia');

    }
	
	public function cancha()
    {
        return $this->hasOne('App\Models\Cancha','id_cancha','cancha');

    }
	
	public function bandaHoraria()
    {
        return $this->hasOne('App\Models\BandaHoraria','id_banda_horaria','banda_horaria');

    }
}

?>
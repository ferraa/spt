<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BandaHoraria extends Model {
	
	protected $primaryKey = "id_banda_horaria";
	protected $softDelete = true;

	protected $table = "bandas_horarias";

}

?>
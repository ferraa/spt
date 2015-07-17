<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model {

	protected $primaryKey = "id_reserva";
	protected $softDelete = true;
	

	public function cancha()
    {
        return $this->hasOne('App\Models\Cancha','id_cancha','cancha');

    }
	
	public function dia()
    {
        return $this->hasOne('App\Models\Dia','id_dia','dia');

    }
	
	public function cliente()
    {
        return $this->hasOne('App\Models\Cliente','id_cliente','cliente');

    }
	
	public function usuario()
    {
        return $this->hasOne('App\User','id_user','usuario');

    }
    public function setPagadoOn(){
        $this->pago=1;
    }
}

?>
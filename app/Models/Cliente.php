<?php
namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model{

    use SoftDeletes;

	protected $primaryKey = "id_cliente";

    protected $hidden = ['password'];


	public function setPassword(){
	
		$this->setAttribute('password',Hash::make($this->dni));
		
	}

}

?>
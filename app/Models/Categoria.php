<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
	
	//public static $table="categorias";

	protected $primaryKey = "id_categoria";

	public $timestamps= false;

	/**public function user()
    {
        return $this->belongsTo('User','categoria');
    }*/

    
}
	
?>
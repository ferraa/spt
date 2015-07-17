<?php
namespace App\Http\Controllers;
//Para utilizar el findOrFail y mandar un 404 si Falla.
/*use Illuminate\Database\Eloquent\ModelNotFoundException;
App::error(function(ModelNotFoundException $e)
{
	return Response::make('Not Found', 404);
});
*/
use App\Models\Precio;


class PrecioController extends Controller{


    public function __construct(){
        $this->middleware('auth');
        $this->middleware('lang');
    }

	public function getIndex(){
		$precios= Precio::paginate(10);
		//$users= User::find(9)->categoria();//->toArray();//->categoria();
		//var_dump($users);
		//Si quiero por ejemplo los administradores solamente(Descomentar en Modelo Tambien)
		//$users = User::administrador()->get();
		//dd($precios);
		return view('precios.index')->with('precios',$precios);
	}

	/*public function getCreate(){
		return View::make('precios.create');
	}
	public function postCreate(){



		


		$validator = Validator::make(Input::all(), Precio::rules);

		if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

		}
		else{
			$cliente= new Precio;
			
			$cliente->telefono=Input::get('telefono');
			$cliente->dni=Input::get('dni');
			$cliente->nombres=Input::get('nombres');
			$cliente->apellidos=Input::get('apellidos');
			$cliente->email=Input::get('email');
			$cliente->setPassword();
			
			$cliente->save();
			
			return Redirect::to('precios');
		}
	}

	public function getEdit($id_precio){

		$precio=Precio::findOrFail($id_precio);

		return View::make('precios.edit')->with('precio',$precio);

	}

	public function getDelete($id_precio){
		

		$precio = Precio::findOrFail($id_precio);
		$precio->delete();
		
		return Redirect::to('precios');
	}

	public function postEdit(){

		$validator = Validator::make(Input::all(), Precio::rules);

		if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

		}
		else{
		
			$cliente->telefono=Input::get('telefono');
			$cliente->dni=Input::get('dni');
			$cliente->nombres=Input::get('nombres');
			$cliente->apellidos=Input::get('apellidos');
			$cliente->email=Input::get('email');
			$cliente->setPassword();
			
			$cliente->save();
			
			return Redirect::to('precios');
		}

	}*/
	
	
}

?>

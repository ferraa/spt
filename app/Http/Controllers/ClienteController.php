<?php
namespace App\Http\Controllers;
//Para utilizar el findOrFail y mandar un 404 si Falla.
//use Illuminate\Database\Eloquent\ModelNotFoundException;
/*App::error(function(ModelNotFoundException $e)
{
	return Response::make('Not Found', 404);
});*/

use App\Http\Requests\CreateClientePostRequest;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ClienteController extends Controller{


    public function __construct(){
        $this->middleware('auth');
        $this->middleware('lang');
    }


	public function getIndex(){
		$clientes= Cliente::all();
		//$users= User::find(9)->categoria();//->toArray();//->categoria();
		//var_dump($users);
		//Si quiero por ejemplo los administradores solamente(Descomentar en Modelo Tambien)
		//$users = User::administrador()->get();
		//return View::make('clientes.index')->with('clientes',$clientes);
        return view('clientes.index')->with('clientes',$clientes);
	}

	public function getCreate(){
		return view('clientes.create');
	}
	public function postCreate(CreateClientePostRequest $request){

			$cliente= new Cliente;
			
			$cliente->telefono=$request->get('telefono');
			$cliente->dni=$request->get('dni');
			$cliente->nombres=$request->get('nombres');
			$cliente->apellidos=$request->get('apellidos');
			$cliente->email=$request->get('email');
			$cliente->setPassword();
			
			$cliente->save();
			
			return redirect('clientes');
		//}
	}

	public function getEdit($id_cliente){


        try {
            $cliente = Cliente::findOrFail($id_cliente);
        }
        catch(ModelNotFoundException $e) {
            dd(get_class_methods($e)); // lists all available methods for exception object
            dd($e);

        }

		return View::make('clientes.edit')->with('cliente',$cliente);

	}

	public function getDelete($id_cliente){


        try {
            $cliente = Cliente::findOrFail($id_cliente);
        }
        catch(ModelNotFoundException $e) {
           // dd(get_class_methods($e)); // lists all available methods for exception object
            //dd($e->getMessage());
            return "Esta intentando borrar un cliente que no existe";
        }

		$cliente->delete();
		
		return redirect('clientes');
	}

	public function postEdit(){

		$validator = Validator::make(Input::all(), Cliente::rules);

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
			
			return Redirect::to('clientes');
		}

	}

	public function getBuscar(Request $request, $telefono){

		if($request->ajax()){

		$cliente=Cliente::where('telefono',$telefono)->first();

		 return response()->json($cliente);

		}
	}
	
	
}

?>

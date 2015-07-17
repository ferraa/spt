<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cancha;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservaController extends Controller{
	

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('lang');
    }

	public function getIndex(){
		$reservas= Reserva::paginate(2);
		return view('reservas.index');
	}
	public function getMostrar($fecha){

		$reservas= Reserva::where('fecha','=',$fecha)->orderBy('desde')->orderBy('cancha')->get();
		$canchas=Cancha::all();
		return view('reservas.mostrar')->with('reservas',$reservas)->with('canchas',$canchas)->with('fecha',$fecha);
	}
	/*public function getCreate(){

		$categorias=Categoria::all()->lists('nombre','id_categoria');

		return View::make('users.create')->with('categorias',$categorias);
	}*/
	public function getGenerar($idcancha,$desde,$fecha){

		
		$iddia=date_format(date_create($fecha),'N');

		//$iddia=1;
		$desde=$desde.":00";



		$precio=Precio::join('bandas_horarias','bandas_horarias.id_banda_horaria','=','precios.banda_horaria')->where('cancha','=',$idcancha)
		->where('dia','=',$iddia)->where('desde','<=', $desde)->Where('hasta','>=' ,$desde)->select('precio')->first();
		$precio=$precio['precio'];

		return view('reservas.generar')->with('idcancha',$idcancha)->with('desde',$desde)->with('fecha',$fecha)->with('precio',$precio)->with('iddia',$iddia);
	}

	public function getCobrar($id_reserva){

		$reserva=Reserva::findOrFail($id_reserva);

		return view('reservas.cobrar')->with('reserva',$reserva);
	}

	public function postCobrar(){

		$id_reserva_viejo=Input::get('id_reserva');
		$renovar=Input::get('renovar');
		if($renovar){
			$proximaSenia=Input::get('proximaSenia');
			$proximaFecha=Input::get('proximaFecha');
		}

		$reservaVieja=Reserva::findOrFail($id_reserva_viejo);

		$reservaVieja->setPagadoOn();


		if($renovar){
			

			$busca=Reserva::where('fecha','=',$proximaFecha)->where('cancha','=',$reservaVieja->cancha)->where('desde','=',$reservaVieja->desde)->get();
			//var_dump($busca);
			if($busca->isEmpty()){
				//echo "No existe";
				$reserva= new Reserva();
			

				$reserva->cancha=$reservaVieja->cancha;
				$reserva->desde=$reservaVieja->desde;
				$reserva->hasta=$reservaVieja->hasta;
				$reserva->fecha=$proximaFecha;
				$reserva->senia=$proximaSenia;
				$reserva->precio=$reservaVieja->precio;
				$reserva->cliente=$reservaVieja->cliente;

				$reserva->usuario=Auth::user()->id_user;

				//return $reserva;
				
				$reserva->save();


				$reservaVieja->save();

				return Redirect::to('reservas/mostrar/'.$reservaVieja->fecha);
			
			}else echo "Ya existe";

		}
		else{
			echo"no se renueva";
		}

	}
	
	public function postCreate(Request $request){


		//return Input::all();
		
		/*$rules = array('dni' => 'required|unique:users',
						'nombres' => 'required',
						'apellidos' => 'required',
						'email' => 'email',
						'categoria' => 'numeric',
						'password' => 'required|min:6');


		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

		}
		else{*/


			$reserva= new Reserva();
		

			$reserva->cancha=$request->get('cancha');
			$reserva->desde=$request->get('desde');
			$reserva->hasta=$request->get('hasta');
			$reserva->fecha=$request->get('fecha');
			$reserva->senia=$request->get('senia');
			$reserva->precio=$request->get('precio');
			$reserva->cliente=$request->get('cliente');

			$reserva->usuario=Auth::user()->id_user;

			//return $reserva;
			
			$reserva->save();
			
			return;

			//return Redirect::to('reservas');

		//}
		//return;
	}

	/*public function getDelete($id_user){
		

			$user = User::findOrFail($id_user);
			$user->delete();
			
			return Redirect::to('users');
	}


	public function getUpdate($id_user){

		$categorias=Categoria::all()->lists('nombre','id_categoria');
		$user=User::findOrFail($id_user);


		return View::make('users.update')->with('user',$user)->with('categorias',$categorias);


	}

	public function postUpdate($user_id){


		$user=User::findOrFail($user_id);

		$user->dni=Input::get('dni');
		$user->nombres=Input::get('nombres');
		$user->apellidos=Input::get('apellidos');
		$user->email=Input::get('email');
		$user->categoria=Input::get('categoria');
		if(Input::has('password')){
			$user->setPassword(Input::get('password'));
		}
		$user->save();
		
		return Redirect::to('users');

	}*/

	
}

?>

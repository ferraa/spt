<?php namespace App\Http\Controllers;

use App\Models\Cancha;


class CanchaController extends Controller{


    public function __construct(){
        $this->middleware('auth');
        $this->middleware('lang');
    }


	public function getIndex(){
		$canchas= Cancha::all();
		//$users= User::find(9)->categoria();//->toArray();//->categoria();
		//var_dump($users);
		//Si quiero por ejemplo los administradores solamente(Descomentar en Modelo Tambien)
		//$users = User::administrador()->get();
		return view('canchas.index')->with('canchas',$canchas);
	}

	public function getCreate(){
		return view('canchas.create');
	}
	public function postCreate(){



		


		$validator = Validator::make(Input::all(), Cancha::rules);

		if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

		}
		else{
			$cancha= new Cancha;
			
			$cancha->descripcion=Input::get('descripcion');
			
			$cancha->save();
			
			return Redirect::to('canchas');
		}
	}

	public function getEdit($id_cancha){

		$cancha=Cancha::findOrFail($id_cancha);

		return View::make('canchas.edit')->with('cancha',$cancha);

	}

	public function getDelete($id_cancha){
		

		$cancha = Cancha::findOrFail($id_cancha);
		$cancha->delete();
		
		return Redirect::to('canchas');
	}

	public function postEdit(){

		$validator = Validator::make(Input::all(), Cancha::rules);

		if($validator->fails()){

				return Redirect::back()->withErrors($validator)->withInput();

		}
		else{
		
			$cancha->descripcion=Input::get('descripcion');
			
			$cliente->save();
			
			return Redirect::to('canchas');
		}

	}
	
	
}

?>

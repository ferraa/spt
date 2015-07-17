<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserPostRequest;
use App\User;
use App\Models\Categoria;

class UserController extends Controller{



    public function __construct(){
        $this->middleware('auth');
        $this->middleware('lang');
    }

	public function getIndex(){
		$users= User::paginate();

		//Si quiero por ejemplo los administradores solamente(Descomentar en Modelo Tambien)
		//$users = User::administrador()->get();
		return view('users.index')->with('users',$users);
	}

	public function getCreate(){

		$categorias=Categoria::all()->lists('nombre','id_categoria');

		return view('users.create')->with('categorias',$categorias);
	}
	public function postCreate(CreateUserPostRequest $request){


			$user= new User;
			
			$user->dni=$request->get('dni');
			$user->name=$request->get('nombres');
			$user->apellidos=$request->get('apellidos');
			$user->email=$request->get('email');
			$user->categoria=$request->get('categoria');
			$user->setPassword($request->get('password'));
			
			$user->save();
			
			return redirect('users');

	}

	public function getDelete($id_user){
		

			$user = User::findOrFail($id_user);
			$user->delete();
			
			return redirect('users');
	}


	public function getUpdate($id_user){

		$categorias=Categoria::all()->lists('nombre','id_categoria');
		$user=User::findOrFail($id_user);


		return view('users.update')->with('user',$user)->with('categorias',$categorias);


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

	}

	
	public function getPerfil(){
		
		return view('auth.perfil');
	}
	
}

?>

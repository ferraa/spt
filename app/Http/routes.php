<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/


/*$languages = array('en', 'es','it');
$prefix = '';
if (in_array(Request::segment(1), $languages)) {
    \App::setLocale(Request::segment(1));
    $prefix = Request::segment(1);
}


Route::group(array('prefix' => $prefix), function () {*/

    //todas las rutas de tu aplicación aquí });






    Route::controller('users','UserController');
    Route::controller('clientes','ClienteController');

    Route::controller('precios','PrecioController');

    //Route::get('/','Auth\AuthController@getLogin');

    Route::get('/',['middleware'=>'lang' ,function(\Illuminate\Http\Request $request){

        if(!$request->session()->has('lang'))
            return view('portada.lang');
        else{
            return view('portada.index');
        }
    }]);
   /* Route::get('/lang',function(){
        return view('portada.lang');
    });*/
    Route::get('/lang/{lang}',function(\Illuminate\Http\Request $request,$lang){
        $languages = array('en', 'es','it');
        if (in_array($lang, $languages)) {
            $request->session()->set('lang', $lang);


            return redirect()->back();
        }

    });

Route::get('/langapp/{lang}',function(\Illuminate\Http\Request $request,$lang){
    $languages = array('en', 'es','it');
    if (in_array($lang, $languages)) {
            $request->session()->set('lang', $lang);


        return redirect()->to('reservas/mostrar/'.date('Y-m-d'));
    }

});

Route::get('/cerrar',function(\Illuminate\Http\Request $request){

        $request->session()->forget('lang');


});
  /*  Route::get('welcome',['middleware'=>'lang', function () {

        return view('portada.index');
        //
    }]);*/

    Route::get('/home','ReservaController@getIndex');

// Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');



    Route::controller('canchas','CanchaController');

    /*Route::get('reservas',function(){
        return View::make('reservas.index');
    });
    */
    Route::controller('reservas','ReservaController');


//});





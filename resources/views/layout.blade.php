<!DOCTYPE html>
<html>
	<head>
		<title>Sportime 1.0 @yield('title','Sportime 1.0')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{!! Html::script('/assets/js/jquery-ui-1.10.4.custom.min.js')!!}
    
		<style type="text/css">
			body {
				padding-top: 70px;
			}
		</style>
		
	</head>
	<body>

		 <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sportime 1.0</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="{{ URL::to('reservas/mostrar/'.date('Y-m-d')) }}">Reservas</a></li>
            <li><a href="#">Planilla diaria</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administracion <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::to('users') }}">Usuarios</a></li>
                <li><a href="{{ URL::to('clientes') }}">Clientes</a></li>
                <li><a href="{{ URL::to('canchas') }}">Canchas</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Configuracion</li>
                <li><a href="{{ URL::to('precios') }}">Precios</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
        	<li class="active"><a><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
            <li><a href="{{ URL::to('logout') }}">Cerrar Sesion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

			<div class="container">

				@yield('content')

			</div>


		

	</body>

</html>

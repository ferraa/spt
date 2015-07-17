<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sportime 1.0</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    {!! Html::style('css/app.css') !!}
    {{-- !! Html::script('js/bootstrap.min.js') !!--}}

    <!--link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"-->

    <script src="/js/jquery-ui-1.10.4.custom.min.js"></script>

    <!--link href="{{ asset('/css/app.css') }}" rel="stylesheet"-->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" style="padding:0" href="#"><img src="/img/logo.png" width="120px" height="50px"> </a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if (!Auth::guest())
				<ul class="nav navbar-nav">
                    <li><a href="#">{{ trans('menu.home') }}</a></li>
                    <li class="active"><a href="{{ URL::to('reservas/mostrar/'.date('Y-m-d')) }}">{{ trans('menu.reservas') }}</a></li>
                    <li><a href="#">{{ trans('menu.planilla_diaria') }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('menu.administracion') }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('users') }}">{{ trans('menu.usuarios') }}</a></li>
                            <li><a href="{{ URL::to('clientes') }}">{{ trans('menu.clientes') }}</a></li>
                            <li><a href="{{ URL::to('canchas') }}">{{ trans('menu.canchas') }}</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">{{ trans('menu.configuracion') }}</li>
                            <li><a href="{{ URL::to('precios') }}">{{ trans('menu.precios') }}</a></li>

                        </ul>
                    </li>

				</ul>
                @endif

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<!--li><a href="{{ url('/auth/login') }}">Login</a></li-->
						<!--li><a href="{{ url('/auth/register') }}">Register</a></li-->
					@else
						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user">&nbsp;</span>{{ Auth::user()->name." ".Auth::user()->apellidos }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">

                                <li class="dropdown-header">{{ trans('menu.cambiar_idioma') }}</li>
                                <li><a href="{{ url('/langapp/es') }}">{{ trans('menu.es') }}</a></li>
                                <li><a href="{{ url('/langapp/en') }}">{{ trans('menu.en') }}</a></li>
                                <li><a href="{{ url('/langapp/it') }}">{{ trans('menu.it') }}</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/auth/logout') }}">{{ trans('menu.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

    <div class="container">
        <div class="row">
	        @yield('content')
        </div>
    </div>

	<!-- Scripts -->
	<!--script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script-->
	<!--script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script-->
    @yield('scripts')
</body>
</html>

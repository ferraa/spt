@extends('app')

@section ('title') - Lista de Usuarios @stop

@section ('content')

	
	
	@if($users)


		<h1>Usuarios <small>en el sistema</small></h1>


		<table class="table table-striped">

			<tr>
				<th>DNI</th>
				<th>Nombre y Apellido</th>
				<th>E-Mail</th>
				<th>Categoria</th>
				<th></th>
			</tr>

		@foreach($users as $user)

			<tr>
			
				<td>{{ $user->dni }}</td>
				<td>{{ $user->nombres." ".$user->apellidos }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->categoria}}</td>
				<td>
					<a href="users/update/{{$user->id_user}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
					<a href="users/delete/{{$user->id_user}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					
				</td>
			</tr>

		

		@endforeach


		</table>


		{!! $users->render()!!}
		{!! Html::link('users/create','Crear un Usuario',array('class'=>'btn btn-primary')) !!}

		

	@else
		Todavia no hay ningun usuario registrado
	@endif


@stop
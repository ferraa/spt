@extends('app')

@section ('title') - Lista de Clientes @stop

@section ('content')

	
	
	@if($clientes)


		<h1>Clientes <small>en el sistema</small></h1>


		<table class="table table-striped">

			<tr>
				<th>Telefono</th>
				<th>DNI</th>
				<th>Nombre y Apellido</th>
				<th>E-Mail</th>
				<th></th>
			</tr>

		@foreach($clientes as $cliente)

			<tr>
				<td>{{ $cliente->telefono }}</td>
				<td>{{ $cliente->dni }}</td>
				<td>{{ $cliente->nombres." ".$cliente->apellidos }}</td>
				<td>{{ $cliente->email }}</td>
				<td><a href="clientes/delete/{{$cliente->id_cliente}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Borrar</a></td>
			</tr>

		

		@endforeach

		</table>

	@else
		Todavia no hay ningun cliente registrado
	@endif

	{!! Html::link('clientes/create','Crear un Cliente',array('class'=>'btn btn-primary')) !!}

@stop
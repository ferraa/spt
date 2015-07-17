@extends('app')

@section ('title') - Lista de Canchas @stop

@section ('content')

	
	
	@if($canchas)


		<h1>Canchas <small>en el sistema</small></h1>


		<table class="table table-striped">

			<tr>
				<th>ID Cancha</th>
				<th>Descripcion</th>
				<th></th>
			</tr>

		@foreach($canchas as $cancha)

			<tr>
			
				<td>{{ $cancha->id_cancha }}</td>
				<td>{{ $cancha->descripcion }}</td>
				<td>
					<a href="canchas/update/{{$cancha->id_cancha}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
					<a href="canchas/delete/{{$cancha->id_cancha}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					
				</td>
			</tr>

		

		@endforeach

		</table>

	@else
		Todavia no hay ninguna cancha registrado
	@endif

	{!! Html::link('canchas/create','Crear una Cancha',array('class'=>'btn btn-primary')) !!}

@stop
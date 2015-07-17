@extends('app')

@section('title') Precios @stop

@section('content') 
		<h1>Precios <small>en el sistema</small></h1>


		<table class="table table-striped">

			<tr>
				<th>Cancha</th>
				<th>Dia</th>
				<th>Banda horaria</th>
				<th>Precio</th>
				<th></th>
			</tr>

		@foreach($precios as $precio)

			<tr>
			
				<td>{{ $precio->cancha()->first()->descripcion }}</td>
				<td>{{ $precio->dia()->first()->dia }}</td>
				<td>{{ "De ".$precio->bandaHoraria()->first()->desde." a ".$precio->bandaHoraria()->first()->hasta }}</td>
				<td>{{ $precio->precio}}</td>
				<td>
					<a href="precios/update/{{$precio->id_precio}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
					<a href="precios/delete/{{$precio->id_precio}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					
				</td>
			</tr>

		

		@endforeach


		</table>


		{!! $precios->render()!!}
		{!! Html::link('precios/create','Crear un Usuario',array('class'=>'btn btn-primary')) !!}
	
	@stop
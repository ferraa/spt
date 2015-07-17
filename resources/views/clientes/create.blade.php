@extends('app ')

@section ('title') Crear Cliente @stop

@section ('content')

<h1>Crear un Cliente</h1>




{!! Form::open(array("autocomplete"=>"off","class"=>"form-horizontal","role"=>"form","style"=>"max-width:500px")) !!}
  
  <div class="form-group">
    {!!Form::label('telefono', 'Tel.', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
      {!! Form::text('telefono','',array("class"=>"form-control","placeholder"=>"Telefono")) !!}
      {{ $errors->first('telefono')}}
    </div>
  </div> 


  <div class="form-group">
  	{!!Form::label('dni', 'DNI', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('dni','',array("class"=>"form-control","placeholder"=>"DNI")) !!}
      {{ $errors->first('dni')}}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('nombres', 'Nombres', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('nombres','',array("class"=>"form-control","placeholder"=>"Nombres")) !!}
      {{ $errors->first('nombres')}}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('apellidos', 'Apellidos', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('apellidos','',array("class"=>"form-control","placeholder"=>"Apellidos")) !!}
    	{{ $errors->first('apellidos')}}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('email', 'E-mail', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('email','',array("class"=>"form-control","placeholder"=>"E-mail")) !!}
    	{{ $errors->first('email')}}
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </div>
  </div>

{!! Form::close() !!}

@stop
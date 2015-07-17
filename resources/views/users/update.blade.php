@extends('app')

@section ('title') Modificar Usuario @stop

@section ('content')

<h1>Modificar un Usuario</h1>




{!! Form::open(array("autocomplete"=>"off","class"=>"form-horizontal","role"=>"form","style"=>"max-width:500px")) !!}
  <div class="form-group">
  	{!!Form::label('dni', 'DNI', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('dni',$user->dni,array("class"=>"form-control","placeholder"=>"DNI")) !!}
      {!! $errors->first('dni')!!}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('nombres', 'Nombres', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('nombres',$user->name,array("class"=>"form-control","placeholder"=>"Nombres")) !!}
      {!! $errors->first('nombres')!!}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('apellidos', 'Apellidos', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('apellidos',$user->apellidos,array("class"=>"form-control","placeholder"=>"Apellidos")) !!}
    	{!! $errors->first('apellidos')!!}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('email', 'E-mail', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{!! Form::text('email',$user->email,array("class"=>"form-control","placeholder"=>"E-mail")) !!}
    	{!! $errors->first('email')!!}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('categoria', 'Categoria', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
    	{{-- Form::text('categoria',$user->categoria,array("class"=>"form-control","placeholder"=>"Categoria")) --}}
      {!! Form::select('size', $categorias,$user->categoria,array("class"=>"form-control","name"=>"categoria","id"=>"categoria")) !!}
    	{!! $errors->first('categoria')!!}
    </div>
  </div>
  <div class="form-group">
    {!!Form::label('password', 'Contraseña', array("class"=>"col-lg-2 control-label"))!!}
    <div class="col-lg-10">
     {!! Form::password('password',array("class"=>"form-control","placeholder"=>"Contraseña")) !!}
     {!! $errors->first('password')!!}
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>

{!! Form::close() !!}

@stop
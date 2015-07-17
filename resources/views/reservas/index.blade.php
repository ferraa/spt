@extends('app')

@section ('title') Reservas @stop

@section ('content')
{{ Html::style('/assets/css/jquery-ui-1.10.4.custom.min.css') }}
<script>
    $(function() {
    $("#datepicker").datepicker({
      showOn: "button",
      buttonImage: "/assets/img/calendar.gif",
      buttonImageOnly: true,
      dateFormat: "dd/mm/yy"
    });
  });
  </script>

<h1>Reservas</h1>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="mySmallModalLabel">Turno</h4>
        </div>
        <div class="modal-body">
          Cancelar
        </div>
      </div><!-- /.modal-content -->
    </div>
</div>

<div class="modal fade modal-sin-reserva" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="mySmallModalLabel">Reservar</h4>
        </div>
        <div class="modal-body">
         {{ Form::open(array("autocomplete"=>"off","class"=>"form-horizontal","role"=>"form","style"=>"max-width:500px")) }}
  
  <div class="form-group">
    {{Form::label('telefono', 'Tel.', array("class"=>"col-lg-2 control-label"))}}
    <div class="col-lg-10">
      {{ Form::text('telefono','',array("class"=>"form-control","placeholder"=>"Telefono")) }}
      {{ $errors->first('telefono')}}
    </div>
  </div> 


  <div class="form-group">
    {{Form::label('desde', 'Desde', array("class"=>"col-lg-2 control-label"))}}
    <div class="col-lg-10">
      {{ Form::text('desde','',array("class"=>"form-control","placeholder"=>"Desde")) }}
      {{ $errors->first('desde')}}
    </div>
  </div>
  <div class="form-group">
    {{Form::label('hasta', 'Hasta', array("class"=>"col-lg-2 control-label"))}}
    <div class="col-lg-10">
      {{ Form::text('hasta','',array("class"=>"form-control","placeholder"=>"Hasta")) }}
      {{ $errors->first('hasta')}}
    </div>
  </div>
  
  <div class="form-group">
    {{Form::label('senia', 'Seña', array("class"=>"col-lg-2 control-label"))}}
    <div class="col-lg-10">
      {{ Form::text('senia','',array("class"=>"form-control","placeholder"=>"Seña")) }}
      {{ $errors->first('senia')}}
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Hacer reserva</button>
    </div>
  </div>

{{ Form::close() }}

        </div>
      </div><!-- /.modal-content -->
    </div>
</div>

<div class="panel panel-default">
  <!-- Default panel contents -->
    <div class="panel-heading" style="height: 60px; width: 100%; display: block;">

    <div class="col-xs-6 col-md-3">
      <a href="#">
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span></button>
      </a>
    </div>

    <div class="col-xs-6 col-md-3">
      <h4>Dia: Jueves</h4>
    </div>

    <div class="col-xs-6 col-md-3">
       <h4>Fecha: <input style="width:100px" type="text" disabled id="datepicker" class="btn btn-default" text="24/06/2014" /></h4>
    </div>

    <div class="col-xs-6 col-md-3">
      <a href="#">
        <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-arrow-right"></span></button>
      </a>
    </div>



  </div>

<div class="table-responsive">
  <table class="table table-bordered">
        <thead>
          <tr>
            <th>Hora</th>
            <th>Cancha 1</th>
            <th>Cancha 2</th>
            <th>Cancha 3</th>
            <th>Cancha 4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>08:00</td>
            <td rowspan="2" class="success" data-toggle="modal" data-target=".bs-example-modal-sm">Resrva con seña Juan</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
          </tr>
          <tr>
            <td>08:30</td>
          </tr>
          <tr>
            <td>09:00</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" class="info" data-toggle="modal" data-target=".bs-example-modal-sm">Abono Matias</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
          </tr>
          <tr>
            <td>09:30</td>
          </tr>
          <tr>
            <td>10:00</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" class="danger" data-toggle="modal" data-target=".bs-example-modal-sm">Reserva sin seña Carlos</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
          </tr>
          <tr>
            <td>10:30</td>
          </tr>
          <tr>
            <td>11:00</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
          </tr>
          <tr>
            <td>11:30</td>
          </tr>
          <tr>
            <td>12:00</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
          </tr>
          <tr>
            <td>12:30</td>
          </tr>
          <tr>
            <td>13:00</td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
            <td rowspan="2" data-toggle="modal" data-target=".modal-sin-reserva"></td>
          </tr>
          <tr>
            <td>13:30</td>
          </tr>
          <tr>
            <td>14:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>14:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>15:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>15:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>16:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>16:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>17:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>17:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>18:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>18:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>19:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>19:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>20:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>20:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>21:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>21:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>22:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>22:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>23:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>23:30</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@stop
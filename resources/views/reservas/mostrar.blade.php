@extends('app')

@section ('title') - Lista de Reservas @stop

@section ('content')

    <style>
        .popover-all {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1010;
            display: none;
            padding: 5px;

        }
        .popover-all.bottom {
            margin-top: 5px ;
        }

        .popover-all.bottom .popover-arrow {
            top: 0;
            left: 50%;
            margin-left: -5px ;
            border-left: 5px solid transparent ;
            border-right: 5px solid transparent ;
            border-bottom: 5px solid #000000 ;
        }

        .popover-all .popover-arrow {
            position: absolute;
            width: 0;
            height: 0;
        }

        .popover-inner {
            padding: 3px;
            width: 200px;
            overflow: hidden;
            background: #000000;
            background: rgba(0, 0, 0, 0.8);
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        }
        .popover-title {
            padding: 8px 14px;
            margin: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 18px;
            background-color: #f7f7f7;
            border-bottom: 1px solid #ebebeb;
            -webkit-border-radius: 5px 5px 0 0;
            -moz-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;

        }

        .popover-content {
            padding: 9px 14px;
            background-color: #ffffff;
            -webkit-border-radius: 0 0 3px 3px;
            -moz-border-radius: 0 0 3px 3px;
            border-radius: 0 0 3px 3px;
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding-box;
            background-clip: padding-box;
        }

    </style>
{!! Html::style('/css/jquery-ui-1.10.4.custom.min.css') !!}

	
	 
	@if($reservas)

		<h1>Reservas <small>en el sistema</small></h1>


		<!--table class="table table-striped">

			<tr>
				<th>Id reserva</th>
				<th>Cancha</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Fecha</th>
				<th>Seña</th>
				<th>Precio</th>
				<th>Cliente</th>
				<th>Usuario</th>
			</tr-->

		@foreach($reservas as $reserva)

			<!--tr>
			
				<td>{{ $reserva->id_reserva }}</td>
				<td>{{ $reserva->cancha()->first()->descripcion }}</td>
				<td>{{ $reserva->desde }}</td>
				<td>{{ $reserva->hasta }}</td>
				<td>{{ $reserva->fecha }}</td>
				<td>{{ $reserva->senia }}</td>
				<td>{{ $reserva->precio }}</td>
				<td>{{ $reserva->cliente()->first()->nombres." ".$reserva->cliente()->first()->apellidos }}</td>
				<td>{{ $reserva->usuario()->first()->nombres." ".$reserva->usuario()->first()->apellidos }}</td>

			</tr-->

		

		@endforeach


		<!--/table>


		<br-->

		

	@else
		Todavia no hay ninguna Reserva registrado
	@endif

	<br />
	
	<div class="modal fade modal-sin-reserva" id="modal-sin-reserva" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   	
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			</div>
		</div>
   	<!-- modal >-->
	</div>


	<div class="modal fade modal-sin-reserva" id="modal-cobrar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   	
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			</div>
		</div>
   	<!-- modal >-->
	</div>

<div class="panel panel-default">
  <!-- Default panel contents -->
    <div class="panel-heading" style="height: 60px; width: 100%; display: block;">

    <div class="col-xs-6 col-md-3">
      <a href="{{URL::to('reservas/mostrar/'.date_format(date_add(date_create($fecha), date_interval_create_from_date_string('-1 day')),'Y-m-d'))}}">
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span></button>
      </a>
    </div>

    <div class="col-xs-6 col-md-3">

    	<? $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'); ?>
      <h4>Dia: {{$dias[date_format(date_create($fecha),'N')-1]}}</h4>
    </div>

    <div class="col-xs-6 col-md-3">
       <h4>Fecha: <input style="width:100px" type="text" disabled id="datepicker" class="btn btn-default" value="{{$fecha}}" /></h4>
    </div>

    <div class="col-xs-6 col-md-3">
      <a href="{{URL::to('reservas/mostrar/'.date_format(date_add(date_create($fecha), date_interval_create_from_date_string('1 day')),'Y-m-d'))}}">
        <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-arrow-right"></span></button>
      </a>
    </div>



  </div>
    <div class="table-responsive">
		<table class="table table-bordered">
        	<thead>
	         	<tr>
		            <th>Hora</th>
		            	@foreach($canchas as $cancha)
			            	<th>{{$cancha->descripcion}}</th>
			            @endforeach
				</tr>
			</thead>
	        <tbody>
			<? 	reset($reservas);
				$objeto=current($reservas);
				$reserva=current($objeto);
			?>
			
	        	 @for($i=8;$i<24;$i++)
					<tr>
						<td>{{$i}}:00</td>
						@if($reserva!=null && $reserva->desde==$i)
							@foreach($canchas as $cancha)
									@if($reserva!=null && $reserva->desde==$i && $reserva->cancha==$cancha->id_cancha)
										<td class="success popover-reserva" data-toggle="popover" data-trigger="focus" title="Reserva" data-content="Dejo seña: {{$reserva->senia}} " >{{ $reserva->cliente()->first()->nombres}}@if($reserva->pago!=1)<a data-toggle="modal" href="/reservas/cobrar/{{$reserva->id_reserva}}" data-target="#modal-cobrar">Cobrar</a>@endif</td>
										 <? $reserva=next($objeto);?>
									@else
										<!--td data-toggle="modal" data-target=".modal-sin-reserva"></td-->
                                    <td>

                                            <a data-toggle="modal" href="/reservas/generar/{{$cancha->id_cancha}}/{{$i}}/{{$fecha}}" data-target="#modal-sin-reserva">Reservar</a>
                                    </td>
									@endif
							@endforeach
						@else

							@foreach($canchas as $cancha)
							
								<!--td data-toggle="modal" data-target=".modal-sin-reserva"></td-->
                               <td >
                                <a data-toggle="modal" href="/reservas/generar/{{$cancha->id_cancha}}/{{$i}}/{{$fecha}}" data-target="#modal-sin-reserva">Reservar</a></td>
							@endforeach
						@endif
					</tr>
				@endfor
				
			</tbody>
		</table>
	</div>

</div>
	

@stop

@section('scripts')


    <script>
        //para ver en español

    </script>
    <script>
        $(document).ready(function(){


            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            //
            //$(function() {
                $("#datepicker").datepicker({
                    showOn: "button",
                    buttonImage: "/img/calendar.gif",
                    buttonImageOnly: true,
                    dateFormat: "yy-mm-dd"
                });
                $('#datepicker').change(function(){
                    //alert($('#datepicker').val());
                    //href($('#datepicker').val());
                    //window.location.href=$('#datepicker').val();

                    $(location).attr('href',$('#datepicker').val());
                });
            //});


            /***********/
            var $popoverInbox = $('.popover-reserva').popover({
                title: 'Test',
                placement: 'auto',
                trigger:'manual',
                template: '<div class="popover-all"><div class="popover-arrow"></div><div class="popover-inner"><h3 class="popover-title">Example</h3><div class="popover-content"></div></div></div>'
            });

            var timerPopover, popover_parent;

            function hidePopover(elem) {
                $(elem).popover('hide');
            }

            $('.popover-reserva').hover(
                    function() {
                        var self = this;
                        clearTimeout(timerPopover);
                        $('.popover-all').hide(); //Hide any open popovers on other elements.
                        popover_parent = self;
                        $(self).popover('show');
                    },
                    function() {
                        var self = this;
                        timerPopover = setTimeout(function(){hidePopover(self);},500);
                    }
            );

            $(document).on({
                mouseenter: function() {
                    clearTimeout(timerPopover);
                },
                mouseleave: function() {
                    var self = this;
                    timerPopover = setTimeout(function(){hidePopover(popover_parent);},500);
                }
            }, '.popover-all');

        });
    </script>
@stop
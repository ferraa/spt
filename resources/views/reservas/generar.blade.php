<!DOCTYPE html>
<html>
<head>
    <title>Sportime 1.0 @yield('title','Sportime 1.0')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--!! Html::style('/assets/css/bootstrap.min.css', array('media'=>'screen')) !!--}}
    {{--!! Html::script('/assets/js/jquery-1.11.1.min.js')  !!--}}
    {{--!! Html::script('/assets/js/bootstrap.min.js')!!--}}
    {{--!! Html::script('/assets/js/jquery-ui-1.10.4.custom.min.js')!!--}}

    <!--style type="text/css">
        body {
            padding-top: 70px;
        }
    </style-->
    <script type="text/javascript">

        $(document).on("ready", function () {

            $("#modal").on('hidden.bs.modal', function () {
                alert('hidden event fired!');
            });
        });

        function buscarCliente(input){

            var texto=$(input).val();
            if(texto.length>=7){
                $.ajax({
                    url:   '/clientes/buscar/'+texto,
                    type:  'get',
                    beforeSend: function () {
                        //alert("Procesando, espere por favor...");
                    },
                    success:  function (response) {
                        // $("#resultado").html(response);
                        if(!jQuery.isEmptyObject(response)){
                            // console.log(response);
                            $("#botonHabilitarNuevoUsuario").css("display", "none");
                            $("#dni").val(response.dni);
                            $("#nombres").val(response.nombres);
                            $("#apellidos").val(response.apellidos);
                            $("#email").val(response.email);
                            $("#idcliente").val(response.id_cliente);
                        }
                        else{
                            // $(input).after($('<button>Nuevo</button>').attr("onclick", "probando()").attr('onsubmit','return false;'));
                            $("#botonHabilitarNuevoUsuario").css("display", "block");
                            $("#dni").val("");
                            $("#nombres").val("");
                            $("#apellidos").val("");
                            $("#email").val("");
                            $("#idcliente").val("");
                        }

                    }
                });

            }

            else{

                $("#dni").val("");
                $("#nombres").val("");
                $("#apellidos").val("");
                $("#email").val("");
                $("#idcliente").val("");
                $("#botonHabilitarNuevoUsuario").css("display", "none");

            }
        }

        function crearReserva(){

            var cancha= $("#cancha").val();
            var desde= $("#desde").val();
            var hasta= $("#hasta").val();
            var fecha= $("#fecha").val();
            var senia= $("#senia").val();
            var precio= $("#precio").val();
            var cliente= $("#idcliente").val();
            var token=$('input[name="_token"]').first().attr('value');

            $.ajax({
                url:   '/reservas/create',
                type:  'post',
                data: {
                    _token:token,
                    cancha: cancha,
                    desde: desde,
                    hasta: hasta,
                    fecha: fecha,
                    senia: senia,
                    precio: precio,
                    cliente: cliente
                },
                beforeSend: function () {
                    alert("Procesando, espere por favor...");
                },
                success:  function (response) {
                    // $("#resultado").html(response);
                    if(jQuery.isEmptyObject(response)){
                        alert("bien procesado");
                        location.reload();
                    }

                },
                statusCode: {
                    404: function() {
                        alert( "Error. Pagina no encontrada" );
                    }
                }
            });

        }

        function habilitarNuevoUsuario(){
            $("#dni").removeAttr("disabled").focus();
            $("#nombres").removeAttr("disabled");
            $("#apellidos").removeAttr("disabled");
            $("#email").removeAttr("disabled");
            $("#idcliente").removeAttr("disabled")
            $("#telefono").attr("disabled","disabled")
            $("#botonHabilitarNuevoUsuario").css("display", "none");
        }

    </script>

</head>
<body>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="mySmallModalLabel">Reservar</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(array("autocomplete"=>"off","class"=>"form-horizontal","role"=>"form","style"=>"max-width:500px","onsubmit"=>"return false")) !!}

            <div class="row">
                <div class="form-group">
                    {!!Form::label('telefono', 'Tel.', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('telefono','',array("class"=>"form-control","placeholder"=>"Telefono","onkeyup"=>"buscarCliente(this)")) !!}
                        {{ $errors->first('telefono')}}
                        <button id="botonHabilitarNuevoUsuario" style="display:none" onclick="habilitarNuevoUsuario()">Agregar</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('dni', 'DNI', array("class"=>"col-lg-2 control-label"))!!}
                <div class="col-lg-10">
                    {!! Form::text('dni','',array("class"=>"form-control","placeholder"=>"DNI","disabled"=>"disabled")) !!}
                    {{ $errors->first('dni')}}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('nombres', 'Nombres', array("class"=>"col-lg-2 control-label"))!!}
                <div class="col-lg-10">
                    {!! Form::text('nombres','',array("class"=>"form-control","placeholder"=>"Nombres","disabled"=>"disabled")) !!}
                    {{ $errors->first('nombres')}}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('apellidos', 'Apellidos', array("class"=>"col-lg-2 control-label"))!!}
                <div class="col-lg-10">
                    {!! Form::text('apellidos','',array("class"=>"form-control","placeholder"=>"Apellidos","disabled"=>"disabled")) !!}
                    {{ $errors->first('apellidos')}}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('email', 'E-mail', array("class"=>"col-lg-2 control-label"))!!}
                <div class="col-lg-10">
                    {!! Form::text('email','',array("class"=>"form-control","placeholder"=>"E-mail","disabled"=>"disabled")) !!}
                    {{ $errors->first('email')}}
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('idcliente', 'IdCliente', array("class"=>"col-lg-2 control-label"))!!}
                <div class="col-lg-10">
                    {!! Form::text('idcliente','',array("class"=>"form-control","placeholder"=>"IDcliente","disabled"=>"disabled")) !!}
                    {{ $errors->first('idcliente')}}
                </div>
            </div>

        </div>
        <div class="col-md-6">
            {!! Form::open(array("autocomplete"=>"off","class"=>"form-horizontal","role"=>"form","style"=>"max-width:500px")) !!}

            <div class="row">
                <div class="form-group">
                    {!!Form::label('fecha', 'Fecha', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('fecha',($fecha),array("class"=>"form-control","placeholder"=>"Fecha","disabled"=>"disabled")) !!}
                        {{ $errors->first('fecha')}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    {!!Form::label('desde', 'Desde', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('desde',$desde,array("class"=>"form-control","placeholder"=>"Desde","disabled"=>"disabled")) !!}
                        {{ $errors->first('desde')}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    {!!Form::label('hasta', 'Hasta', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('hasta',($desde+1).':00',array("class"=>"form-control","placeholder"=>"Hasta","disabled"=>"disabled")) !!}
                        {{ $errors->first('hasta')}}
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    {!!Form::label('senia', 'Seña', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('senia','',array("class"=>"form-control","placeholder"=>"Seña")) !!}
                        {{ $errors->first('senia')}}
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    {!!Form::label('cancha', 'Cancha', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('cancha',$idcancha,array("class"=>"form-control","placeholder"=>"Cancha","disabled"=>"disabled")) !!}
                        {{ $errors->first('cancha')}}
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    {!!Form::label('precio', 'Precio', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('precio',$precio,array("class"=>"form-control","placeholder"=>"Precio","disabled"=>"disabled")) !!}
                        {{ $errors->first('precio')}}
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    {!!Form::label('dia', 'Dia', array("class"=>"col-lg-2 control-label"))!!}
                    <div class="col-lg-10">
                        {!! Form::text('dia',$iddia,array("class"=>"form-control","placeholder"=>"Dia","disabled"=>"disabled")) !!}
                        {{ $errors->first('dia')}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button onclick="crearReserva()" type="submit" class="btn btn-primary">Hacer reserva</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
</body>
</html>

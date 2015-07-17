<!DOCTYPE html>
<html>
  <head>
    <title>Sportime 1.0 @yield('title','Sportime 1.0')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style type="text/css">
      body {
        padding-top: 70px;
      }
    </style>
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

        $.ajax({
                url:   '/reservas/create',
                type:  'post',
                data: { 
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
      <h4 class="modal-title" id="mySmallModalLabel">Cobrar</h4>

    </div>
    <div class="modal-body">
      <form method="post" action="/reservas/cobrar">
        <input type="hidden" id="id_reserva" name="id_reserva" value="{{ $reserva->id_reserva }}">
     <p>Precio {{ $reserva->precio}}</p>
     <p>Seña {{ $reserva->senia}}</p>
     <p>Diferencia {{ ($reserva->precio-$reserva->senia)}}</p>
     <input type="checkbox" name="renovar"/>Reservar proxima semana.  Seña:<input name="proximaSenia" type="text" />
     Fecha:<input name="proximaFecha" type="text" value="2015-04-09"/>

      <p><button onclick="" type="submit" class="btn btn-primary">Confirmar</button></p>

    </div>
  </body>
</html>

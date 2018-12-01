 @extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Notas de Pedido</a></li>
            <li class="breadcrumb-item ">Registrar Nota de Pedido</li>
           
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Salida del Producto</h4>
        @if (count($errors)>0)
            <div class="alert-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach 
                </ul>   
            </div>
        @endif
    </div> 
    
    <div class="card-body">
        <h4 class="card-title">Datos del Ingreso</h4>
        <div class="form-body">
            <div class="row p-t-10">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="proveedor">Trabajador</label>
                        <!-- <select name="idTrabajador" id="idTrabajador" class="form-control selectpicker" data-live-search="true">-->
                            <!-- <option value="" selected="" disabled="">Seleccione</option> -->
                           <!-- @foreach($trabajador as $tra)
                           
                           <option value="{{$tra->idTra}}">{{$tra->nombre.' '.$tra->apellidos}}</option>
                           @endforeach   
                        </select> -->
                        <input type="hidden" name="idTrabajador" id="idTrabajador" class="form-control" value="{{ $usuario[0]->id }}">
                        <input type="text" name="Nombres" id="Nombres" class="form-control" value="{{ $usuario[0]->nombre }} {{ $usuario[0]->apellidos }}" readonly >
                        <!-- {{ $usuario[0]->id }} {{ $usuario[0]->apellidos }} -->
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="proveedor">Almacen</label>
                        <select name="pidAlmacen" id="pidAlmacen" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($almacen as $al)
                            <option value="{{$al->idAl}}">{{$al->codigo.' '.$al->nombre_almacen}}</option>
                            @endforeach  
                        </select>
                    </div>  

                </div> 
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="proveedor">Cliente</label>
                         <input type="hidden"  id="id" class="form-control" placeholder="Direccion">
                        <select name="pidCliente" id="idClientes" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($Cliente as $cl)
                            <option value="{{$cl->id}}_{{$cl->Direccion}}_{{$cl->nro_documento}}">{{$cl->nombre}}</option>
                            @endforeach  
                        </select>
                    </div>                    
                </div> 
            </div>
                <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                       <label>Numero Documento</label>
                        <input type="text"  id="Doc" class="form-control" placeholder="Documento"> 
                    </div>                    
                </div> 
                <div class="col-lg-8">
                    <div class="form-group">
                       <label>Direccion</label>
                        <input type="text"  id="Dir" class="form-control" placeholder="Direccion"> 
                    </div>                    
                </div> 
                                  
                </div>
                          
            </div>
            
        </div>
    </div>    
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Productos</h4>
    </div>
    <div class="card-body">
        <h4 class="card-title">Detalle Productos</h4>
        <div class="form-body">


             <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Codigo de Barras</label>
                        <input type="text" name="pcodigo" id="pcodigo" class="form-control" onkeypress="return runScript(event)">                    
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo de Producto</label>
                        <input type="text" name="pcodigoP" id="pcodigoP" class="form-control" placeholder="Tipo Producto">                    
                    </div>
                </div>


                 <div class="col-md-5">
                    <div class="form-group">
                        <label>Nombre Producto</label>
                        <input type="text" name="pnproducto" id="pnproducto" class="form-control" placeholder="nombre Producto">                    
                    </div>
                </div>
                
            </div>

             <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Talla</label>
                        <input type="text" name="ptalla" id="ptalla" class="form-control" placeholder="talla">                    
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="pcolor" id="pcolor" class="form-control" placeholder="Color">                     
                    </div>
                </div>               
            
                <div class="col-md-3">
                    <div class="from-group">
                        <label>stock</label>
                        <input type="text" name="pstockP" id="pstockP" class="form-control" placeholder="Cantidad">
                    </div>                    
                </div>
                 <div class="col-md-3">
                    <div class="from-group">
                        <label>Precio U.</label>
                        <input type="text" name="pprecio" id="pprecio" class="form-control" placeholder="Precio">
                    </div>                    
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="from-group">
                        <label>Cantidad</label>
                        <input type="text" name="pcantidadPF" id="pcantidadPF" class="form-control" placeholder="cantidad">
                    </div>                    
                </div>   
                <div class="col-md-3">
                    <div class="from-group">
                        <label>Descuento</label>
                        <input type="text" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">
                    </div>                    
                </div> 
                      
                 <div class="col-md-2">
                    <div class="from-group">
                         <button style="margin-top:31px; " type="button" id="bt_add" class="btn btn-primary pull-left">agregar</button>
                    </div>                    
                </div>
          </div>

        </div>
       
    </div>
    <div class="card-footer">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#A9D0F5">
                    <th>opciones</th>
                    <th>Codigo B.</th>
                    <th>Cod.Producto</th>
                    <th>Producto</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Cant.</th>
                    <th>Precio</th>
                    <th>Desc.</th>
                    <th>subtotal</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th>total</th>
                   
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <h4 id="total">s/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></h4>
                    </th>

                </tfoot>
            </table>
            <div class="col-md-3">
                <div class="from-group">
                    <label>Adicional</label>
                    <input type="number" name="adicional" id="padicional" class="form-control" placeholder="adicional">
                </div>                    
            </div>       
        </div>
       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <input name"_token" value="{{ csrf_token() }}" type="hidden">
                <button id="save" class="btn btn-primary" type="button">guardar</button>
                <button class="btn btn-danger" type="reset">cancelar</button>
            </div>
        </div>        
    </div>
</div>



@push('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
        agregar();
    });
    $("#save").click(function(event){             
    // alert("Formulario enviado con jQuery");      
        // console.log($("#codigo_bar[]").val());       
       guardar();
        
    });

});
document.getElementById("idTrabajador").disabled = false;
// captura el evento del codigo de barras y llama al metodo donde se realiza la consulta
function runScript(e) {
    if (e.keyCode == 13) {
        consulBarras();
    }
}
 $("#idClientes").change(MostrarCliente);
var cont=0;
var producto=[];
var total=0;
var subtotal=[];
var filaob=[];


 function MostrarCliente(){
       
        Cliente=document.getElementById('idClientes').value.split('_');
        idcliente=Cliente[0];
        $("#Dir").val(Cliente[1]);
        $("#Doc").val(Cliente[2]);
        $("#id").val(Cliente[0]);
    }


function consulBarras(){
    codBarras=$("#pcodigo").val();
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{codBarras:codBarras}, //datos que se envian a traves de ajax
        url:'barras', //archivo que recibe la peticion
        type:'post', //método de envio
        dataType:"json",//tipo de dato que envio 
        beforeSend: function () {
            console.log('procesando');
            // $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            // console.log(response.consulta);
            if(response.veri==true){
                // var urlBase=window.location.origin;
                // var url=urlBase+'/'+response.data;
                // document.location.href=url; ptalla  pcolor
                document.getElementById('pnproducto').value = response.consulta[0]['nombre_producto'];
                document.getElementById('pcodigoP').value = response.consulta[0]['codigo_Prod'];
                document.getElementById('ptalla').value = response.consulta[0]['nom_talla'];
                document.getElementById('pcolor').value = response.consulta[0]['nombre_color'];
                document.getElementById('pstockP').value = response.consulta[0]['stockP'];
                document.getElementById('pprecio').value = response.consulta[0]['precio_unitario'];

                // console.log( response.consulta);
            }                
        }
      });
}

$("#guardar").show();
var sumadicional=0;
function agregar()
{   
    var codigob=$("#pcodigo").val();
    var codigo=$("#pcodigoP").val();
    var produco=$("#pnproducto").val();
    var talla=$("#ptalla").val();
    var precio=$("#pprecio").val();
    var descuento=$("#pdescuento").val();
    var color=$("#pcolor").val();
    var cantidad=$("#pcantidadPF").val();
    var adicional=$("#padicional").val();
    var stock=$("#pstockP").val();


    
    if( talla!="" && color!="" && cantidad<stock)
    {
       subtotal[cont]=cantidad*(precio-(precio*descuento/100));
       total=total+subtotal[cont];
       
        var fila=
                '<tr class="selected" id="fila'+cont+'">'+
                    '<td>'+
                        '<button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button>'+
                    '</td> '+
                    '<td>'+
                        '<input type="hidden" name="codigo_barr[]" value="'+codigob+'">'+codigob+
                    '</td>  '+                    
                    '<td>'+
                        '<input type="hidden" name="codigoPV[]" value="'+codigo+'">'+codigo+'</td>'+
                    '<td>'+
                        '<input type="hidden" name="productoPV[]" value="'+produco+'">'+produco+'</td> '+
                    '<td>'+
                        '<input type="hidden" name="tallaVP[]" value="'+talla+'">'+talla+'</td> '+
                    '<td>'+
                        '<input type="hidden" name="colorVP[]" value="'+color+'">'+color+'</td> '+
                    '<td>'+
                        '<input type="hidden" name="cantidadPF[]" value="'+cantidad+'">'+cantidad+'</td>'+
                        '<td>'+
                        '<input type="hidden" name="precio_ventaPF[]" value="'+precio+'">'+precio+'</td>'+
                        '<td>'+
                        '<input type="hidden" name="descuento[]" value="'+descuento+'">'+descuento+'</td>'+
                    '<td>'+subtotal[cont]+'</td>'+
                '</tr>';


        cont++;
        var dato={codigob:codigob,precio:precio,descuento:descuento,codigo:codigo,produco:produco,talla:talla,color:color,cantidad:cantidad,adicional:adicional};    
        filaob.push(dato);
        sumadicional+=parseInt(adicional);

        limpiar();
        $("#total").html("s/. " + total);
       $("#total_venta").val(total);
        evaluar();
        $('#detalles').append(fila); 
        // $('#adic').html('S/. '+sumadicional);
        console.log(filaob,adicional);
        // console.log(filaob);

    }
    else
    {
        alert("erros al ingresar el detale del ingreso, revise los datos del articulo");
    }
}

    $( "#padicional" ).change(function() {
        var adi=$("#padicional").val();
        total+=parseFloat(adi);
        document.getElementById("padicional").disabled = true;
        $("#total").html("s/. " + total);

    });
function guardar(){
    var idCliente=$("#id").val();
    var idTrabajador=$("#idTrabajador").val();
    var pidAlmacen=$("#pidAlmacen").val();
    var totalV=$("#total_venta").val();

    
    var vari=[{idCliente:idCliente,idTrabajador:idTrabajador,pidAlmacen:pidAlmacen,totalV:totalV}];
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:  {filas:filaob,opsalida:vari}, //datos que se envian a traves de ajax
        url:   'guardar', //archivo que recibe la peticion
        type:  'post', //método de envio
        dataType: "json",//tipo de dato que envio 
        beforeSend: function () {
            // console.log()
                // $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        
            if(response.veri==true){
                var urlBase=window.location.origin;
                var url=urlBase+'/'+response.data;
                document.location.href=url;
            }else{
                alert("problemas al guardar la informacion");
            }
            console.log(response.filas);
            console.log(response.opsalida);
        }
    });
}

    total=0;
    function limpiar(){
        $("#pcantidad").val("");
        
    }

    function evaluar()
    {
        if(total>0)
        {
            $("#guardar").show();
        }
        else
        {
            $("#guardar").hide();
        }
    }
    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("s/. "+total);
        $("#total_venta").val(total);
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection
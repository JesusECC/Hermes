@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Registro del Producto Final</h4>
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proveedor">Trabajador</label>
                        <!-- <select name="idTrabajador" id="idTrabajador" class="form-control selectpicker" data-live-search="true">
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proveedor">Almacen</label>
                        <select name="idAlmacen" id="idAlmacen" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($almacen as $al)
                            <option value="{{$al->idAl}}">{{$al->codigo.' '.$al->nombre_almacen}}</option>
                            @endforeach  
                        </select>
                    </div>                    
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proveedor">Taller</label>
                        <select name="idTaller" id="idTaller" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                             
                        </select>
                    </div>                    
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proveedor">Numero de Guia</label>
                         <input type="number" name="pnum" id="pcantidadPF" class="form-control" placeholder="cantidad">
                             
                        </select>
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
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Codigo de Barras</label>
                        <input type="text" name="pcodigo" id="pcodigo" class="form-control" onkeypress="return runScript(event)">                    
                    </div>
                </div>
            </div>
            <div class="row">

            

             <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre Producto</label>
                        <input type="text" name="pnproducto" id="pnproducto" class="form-control" placeholder="nombre Producto">                    
                    </div>
                </div>
            <div class="col-md-2">
                    <div class="form-group">
                        <label>Talla</label>
                        <input type="text" name="ptalla" id="ptalla" class="form-control" placeholder="talla">                    
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="pcolor" id="pcolor" class="form-control" placeholder="Color">                     
                    </div>
                </div>


               
            </div>
            <div class="row p-t-10">
                <div class="col-md-4">
                    <div class="from-group">
                        <label>Cantidad de Salida</label>
                        <input type="text" name="pcantidadSMP" id="pcantidadSMP" class="form-control" >
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div class="from-group">
                        <label>Cantidad</label>
                        <input type="text" name="pcantidadPF" id="pcantidadPF" class="form-control" placeholder="cantidad">
                    </div>                    
                </div>               
                 <div class="col-md-3">
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
                    <th>Taller</th>
                    <th>Num. Guia</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>color</th>
                    <th>talla</th>
                    
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    

                </tfoot>
            </table>
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
    // (function($) {
    //    $('#pcodigo').keyup(function () {
    //         console.log("ingrese");
    //         consulBarras();
    //             })
    //   }(jQuery));
});
document.getElementById("idTrabajador").disabled = false;
// captura el evento del codigo de barras y llama al metodo donde se realiza la consulta
function runScript(e) {
    if (e.keyCode == 13) {
        consulBarras();
    }
}
var cont=0;
var producto=[];
total=0;
subtotal=[];
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
                document.getElementById('ptalla').value = response.consulta[0]['nom_talla'];
                document.getElementById('pcolor').value = response.consulta[0]['nombre_color'];
                // console.log( response.consulta);
            }                
        }
      });
}
$('#save').click(function(){
    guardar();
});
function guardar(){

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:  {producto:producto}, //datos que se envian a traves de ajax
        url:   'guardar', //archivo que recibe la peticion
        type:  'post', //método de envio
        dataType: "json",//tipo de dato que envio 
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            if(response.veri==true){
                var urlBase=window.location.origin;
                var url=urlBase+'/'+response.data;
                document.location.href=url;
            }else{
                alert("problemas al guardar la informacion");
            }
        }
    });
}
       



function agregar()
{
    idProducto=$("#pidProducto").val();
    produc=$("#pidProducto option:selected").text();
    cantidad=$("#pcantidadPF").val();
    precio_compra=$("#pprecio_compraPF").val();
    precio_venta=$("#pprecio_ventaPF").val();
    trabajador=$("#idTrabajador").val();
    almacen=$("#idAlmacen").val();
    tipoingreso=$("#idTipo_ingreso").val();

    if(idProducto!="" && cantidad!=""  && precio_compra!="" && precio_venta!="" && trabajador!="" && almacen!="" && tipoingreso!="")
    {
       subtotal[cont]=(cantidad*precio_compra);
       total=total+subtotal[cont];

       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idProduto_PF[]" value="'+idProducto+'">'+produc+'</td> <td><input type="number" name="cantidadPF[]" value="'+cantidad+'"></td> <td><input type="number" name="precio_compraPF[]" value="'+precio_compra+'"></td> <td><input type="number" name="precio_ventaPF[]" value="'+precio_venta+'"></td> <td>'+subtotal[cont]+'</td></tr>';

       cont++;

       var dat={idProducto:idProducto,produc:produc,cantidad:cantidad,precio_compra:precio_compra,precio_venta:precio_venta,trabajador:trabajador,almacen:almacen,tipoingreso:tipoingreso};
        
       producto.push(dat);
console.log(producto);
       limpiar();
      
       evaluar();
       $('#detalles').append(fila);

    }
    else
    {
        alert("erros al ingresar el detale del ingreso, revise los datos del articulo");
    }
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
       
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection
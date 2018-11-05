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
        <h4 class="card-title pull-left">Registro de Materia Prima</h4>
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
                        <select name="idTrabajador" id="idTrabajador" class="form-control selectpicker" data-live-search="true">
                        	<option value="" selected="" disabled="">Seleccione</option>
                           @foreach($trabajador as $tra)
                           
                           <option value="{{$tra->idTra}}">{{$tra->nombre.' '.$tra->apellidos}}</option>
                           @endforeach  
                        </select>
                    </div>
                </div> 
                <div class="col-lg-4">
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
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="proveedor">Tipo Ingreso</label>
                        <select name="idTipo_ingreso" id="idTipo_ingreso" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($Tipo_Comprobante as $ti)
                            <option value="{{$ti->idTC}}">{{$ti->nombre_comprobante}}</option>
                            @endforeach  
                        </select>
                    </div>                    
                </div>
                          
            </div>
                    <div class="row p-t-10">

                           
                           <div class="col-md-5">
                    <div class="from-group">
                        <label>Numero de Comprobante</label>
                        <input type="text" name="pforma_Ing_producto" id="num_comprobanteMP" class="form-control" placeholder="Und, rollo, peso, etc.">
                    </div>                    
                </div>
                <div class="col-md-5">
                    <div class="from-group">
                        <label>Serie de Comprobante</label>
                        <input type="text" name="pforma_Ing_producto" id="serie_comprobanteMP" class="form-control" placeholder="Und, rollo, peso, etc.">
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
          <div class="row p-t-10">


                <div class="col-md-7">
                    <div class="form-group">
                        <label>Producto</label>
                        <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                        	 <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($productos as $prod)
                            <option value="{{$prod->idPro}}">{{$prod->nombre_producto}}</option>
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="from-group">
                        <label>Tipo Ingreso Materia Prima</label>
                        <input type="text" name="pforma_Ing_producto" id="pforma_Ing_producto" class="form-control" placeholder="Und, rollo, peso, etc.">
                    </div>                    
                </div>
            </div>
            <div class="row p-t-10">
            	
                <div class="col-md-3">
                    <div class="from-group">
                        <label>Cantidad</label>
                        <input type="number" name="pcantidadMP" id="pcantidadMP" class="form-control" placeholder="cantidad">
                    </div>                    
                </div>
                <div class="col-md-3">
                    <div class="from-group">
                        <label>Precio compra</label>
                        <input type="number" name="pprecio_compraMP" id="pprecio_compraMP" class="form-control" placeholder="P. comrpa">
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
                    <th>Producto</th>
                    <th>Tipo Ing.</th>
                    <th>cantidad</th>
                    <th>precio compra</th>
                    
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
                  
                    <th><h4 id="total">s/. 0.00</h4><input type="hidden" name="total_compra" id="total_compra"></th>

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
});

var cont=0;
var producto=[];
total=0;
subtotal=[];


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
    cantidad=$("#pcantidadMP").val();
    precio_compra=$("#pprecio_compraMP").val();
    tipo_ingreso_producto=$("#pforma_Ing_producto").val();
    trabajador=$("#idTrabajador").val();
    almacen=$("#idAlmacen").val();
    tipoingreso=$("#idTipo_ingreso").val();
    num_comporbante=$("#num_comprobanteMP").val();
    serie_comprobante=$("#num_comprobanteMP").val();
    //total_com=$("#total_compra").val();

    if(idProducto!="" && cantidad!=""  && precio_compra!="" && trabajador!="" && almacen!="" && tipoingreso!="" && tipo_ingreso_producto!="" && num_comporbante!="" && serie_comprobante!="")
    {
       subtotal[cont]=cantidad*precio_compra;
       total=total+subtotal[cont];

       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idProduto_PF[]" value="'+idProducto+'">'+produc+'</td> <td><input type="text" name="forma_Ing_producto[]" value="'+tipo_ingreso_producto+'"></td> <td><input type="number" name="cantidadPF[]" value="'+cantidad+'"></td> <td><input type="number" name="precio_compraPF[]" value="'+precio_compra+'"></td> <td>'+subtotal[cont]+'</td></tr>';

       cont++;

       var dat={idProducto:idProducto,produc:produc,cantidad:cantidad,precio_compra:precio_compra,trabajador:trabajador,almacen:almacen,tipoingreso:tipoingreso,tipo_ingreso_producto:tipo_ingreso_producto,total:total,num_comporbante:num_comporbante,serie_comprobante:serie_comprobante};
        
       producto.push(dat);
       console.log(producto);
       limpiar();
       $("#total").html("s/. " + total);
       $("#total_compra").val(total);
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
        $("#pcantidadMP").val("");
        $("#pprecio_compraMP").val("");
        $("#pforma_Ing_producto").val("");
     
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
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection
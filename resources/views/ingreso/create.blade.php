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
        <h4 class="card-title pull-left">Nuevo Ingreso</h4>
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
    {!!Form::open(array('url'=>'/ingreso','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}  
    <div class="card-body">
        <h4 class="card-title">Datos del Ingreso</h4>
        <div class="form-body">
            <div class="row p-t-10">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                    <div class="form-group">
                        <label for="proveedor">Trabajador</label>
                        <select name="idTra" id="pid" class="form-control selectpicker" data-live-search="true">
                           @foreach($trabajador as $tra)
                           <option value="{{$tra->idTra}}">{{$tra->nombre.' '.$tra->apellidos}}</option>
                           @endforeach  
                        </select>
                    </div>
                </div> 
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="proveedor">Almacen</label>
                        <select name="idAl" id="pid" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($almacen as $al)
                            <option value="{{$al->idAl}}">{{$al->codigo.' '.$al->nombre_almacen}}</option>
                            @endforeach  
                        </select>
                    </div>                    
                </div> 
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="proveedor">Tipo Ingreso</label>
                        <select name="idAl" id="pid" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                            @foreach($tipoingreso as $ti)
                            <option value="{{$ti->idIn}}">{{$ti->nombreTP}}</option>
                            @endforeach  
                        </select>
                    </div>                    
                </div>
                <div class="col-lg-3">
                    <div class="from-group">
                        <label>Tipo Comprobante</label>
                        <select name="tipo_comprobante" class="form-control">
                            <option value="" selected="" disabled="">Seleccione</option>
                            <option value="boleta">Boleta</option>
                            <option value="factura">Factura</option>
                            <option value="ticket">Ticket</option>
                        </select>
                    </div>                    
                </div>             
            </div>
            <div class="row p-t-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="serie_comprobante">Serie Comprobante</label>
                        <input type="text" name="serie_comprobante" value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie comprobante...">       
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="num_comprobante">Numero Comprobante</label>
                        <input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="numero comprobante..."> 
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Producto</label>
                        <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                            @foreach($productos as $prod)
                            <option value="{{$prod->idPro}}">{{$prod->nombre_producto}}</option>
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="from-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
                    </div>                    
                </div>
                <div class="col-md-2">
                    <div class="from-group">
                        <label for="precio_compra">Precio compra</label>
                        <input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="P. comrpa">
                    </div>                    
                </div>
                <div class="col-md-2">
                    <div class="from-group">
                        <label for="precio_venta">Precio venta</label>
                        <input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. venta">
                    </div>                    
                </div>
            </div>
        </div>
        <button type="button" id="bt_add" class="btn btn-primary pull-right">agregar</button>
    </div>
    <div class="card-footer">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#A9D0F5">
                    <th>opciones</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>precio compra</th>
                    <th>precio venta</th>
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
                    <th><h4 id="total">s/. 0.00</h4></th>

                </tfoot>
            </table>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <input name"_token" value="{{ csrf_token() }}" type="hidden">
                <button class="btn btn-primary" type="submit">guardar</button>
                <button class="btn btn-danger" type="reset">cancelar</button>
            </div>
        </div>        
    </div>
</div>

{!!Form::close()!!}

@push('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
        agregar();
    });
});

var cont=0;
total=0;
subtotal=[];
$("#guardar").hide();

function agregar()
{
    idProducto=$("#pidProducto").val();
    producto=$("#pidProducto option:selected").text();
    cantidad=$("#pcantidad").val();
    precio_compra=$("#pprecio_compra").val();
    precio_venta=$("#pprecio_venta").val();

    if(idProducto!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="")
    {
       subtotal[cont]=(cantidad*precio_compra);
       total=total+subtotal[cont];

       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"></td> <td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td> <td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td> <td>'+subtotal[cont]+'</td></tr>';
       cont++;
       limpiar();
       $("#total").html("s/. " + total);
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
        $("#pprecio_compra").val("");
        $("#pprecio_venta").val("");
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
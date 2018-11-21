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
        <h4 class="card-title pull-left">Registrar Producto Final</h4>
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
        <h4 class="card-title">Datos del Producto</h4>
        <div class="form-body">
            <div class="row p-t-10">

            	<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Tipo Producto</label>
                        <select  class="form-control selectpicker" id="a" data-live-search="true">
                            <option value="" disabled="" selected="">Producto</option>
                            @foreach($detalle_producto as $tp)                
                            <option value="{{$tp->id}}">{{$tp->nombre_producto}}</option>
                            @endforeach  
                        </select>   
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Nombre Producto</label>
                        <input type="text" id="b" class="form-control" placeholder="Ingrese Producto">
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Codigo Producto</label>
                        <input type="text" id="" class="form-control" placeholder="Ingrese Codigo">
                    </div>                    
                </div>

            </div>
            <div class="row p-t-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label">Codigo de Barras</label>
                            <input type="text" id="c" class="form-control" placeholder="Asignar un codigo de barras">
                        </div>                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Almacen</label>
                        <select  class="form-control selectpicker" id="d" data-live-search="true">
                        <option value="" disabled="" selected="">Almacen</option>
                        @foreach($almacen as $al)                
                        <option value="{{$al->id}}">{{$al->nombre_almacen}}</option>
                        @endforeach  
                        </select>    
                    </div>
                </div>
            </div>
            <div class="row p-t-2">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Marca</label>
                        <input type="text" id="e" class="form-control" placeholder="Asignar un marca">                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                        <input type="text" id="f" class="form-control" placeholder="Asignar un categoria">                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Color</label>
                        <select  class="form-control selectpicker" id="g" data-live-search="true">
                        <option value="" disabled="" selected="">Color</option>
                        @foreach($color as $c)                
                        <option value="{{$c->id}}">{{$c->nombre_color}}</option>
                        @endforeach  
                        </select>                         
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>talla</label>
                        <select  class="form-control selectpicker" id="h" data-live-search="true">
                        <option value="" disabled="" selected="">Talla</option>
                        @foreach($talla as $t)                
                        <option value="{{$t->id}}">{{$t->nom_talla}}</option>
                        @endforeach  
                        </select>                         
                    </div>
                </div>
            </div>
            <div class="row p-t-2">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">S/.</span>
                        <input type="text" class="form-control" id="i" aria-label="Amount (to the nearest dollar)" placeholder="Precio Unitario">                      
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">%</span>
                        <input type="text" id="j" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Asignar un descuento">                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" id="k" class="form-control" placeholder="Ingrese Stock">                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color:#A9D0F5">
                                                <th>Tareas</th>
                                                <th>Precio</th>
                                                <th>Opciones</th>
                                            </thead>
                                            <tfoot>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tfoot>
                                        </table>
                                    </div>                                            
                                </div>
                            </div>
                        </div>                        
                    </div>
        <button type="submit" class="btn waves-effect waves-light btn-success pull-right" id="save">Agregar</button>
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


$("#guardar").show();

function agregar()
{
    
    tarea=$("#pnombre_tarea").val();
    precio=$("#pprecioT").val();
   

    if(tarea!="")
    {
       
       var fila='<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="precioT[]" value="'+precio+'">'+precio+'</td><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td></tr>';
       cont++;
       limpiar();
       evaluar();
       $('#detalles').append(fila);

    }
    else
    {
        alert("erros al ingresar el detale del ingreso, revise los datos del articulo");
    }
}


   
    function limpiar(){
        $("#pnombre_tarea").val("");
        
    }

    function evaluar()
    {
        if(cont<0)
        {
            $("#guardar").hide();
        }
        else
        {
            $("#guardar").show();
        }
    }
 function eliminar(index){
        
        $("#fila" + index).remove();
        evaluar();
    }

</script>



@endpush
@endsection




<!--
<script>
    
        $('#save').click(function(){
            saveProducto();
        });
        
        $('#su').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#su').click(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
       
        // Actualizar
       

    });

    function saveProducto(){
        
        // se enviar los datos al controlador empleados
        var idTipoProducto=$("#a").val();
        var nombre=$("#b").val();
        var codigo=$("#c").val();
        var almacen=$("#d").val();
        var marca=$("#e").val();
        var categoria=$("#f").val();
        var color=$("#g").val();
        var talla=$("#h").val();
        var precioU=$("#i").val();
        var descuento=$("#j").val();
        var stock=$("#k").val();
        
 
          
        if(nombre!=''){
        var dat=[{idTipoProducto:idTipoProducto,nombre:nombre,codigo:codigo,almacen:almacen,marca:marca,categoria:categoria,color:color,talla:talla,precioU:precioU,descuento:descuento,stock:stock}];
        console.log(dat);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:  {datos:dat}, //datos que se envian a traves de ajax
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
    }
    var bool;
    
   
</script>
-->
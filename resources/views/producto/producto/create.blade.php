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

    {!!Form::open(array('url'=>'/producto','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}
    <div class="card-body">
        <h4 class="card-title">Datos del Producto</h4>
        <div class="form-body">
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Producto</label>
                        <select name="pidDetalle_produto" class="form-control selectpicker" id="pidDetalle_produto" data-live-search="true">
                            <option value="" disabled="" selected="">Producto</option>
                            @foreach($detalle_producto as $tp)                
                            <option value="{{$tp->id}}">{{$tp->codigo_Prod}}</option>
                            @endforeach  
                        </select>   
                </div>                     
            </div>

        
        
          <div class="col-md-4">
                    <div class="form-group">
                            <label class="control-label">Codigo de Barras</label>
                            <input type="text" name="pCodigoB_Producto" id="pCodigoB_Producto" class="form-control" placeholder="Asignar un codigo de barras">
                    </div>                        
                </div>
            

              <div class="col-md-4">
                    <div class="form-group">
                        <label>Almacen</label>
                        <select  class="form-control selectpicker" name="pAlmacen_idAlmacen" id="pAlmacen_idAlmacen" data-live-search="true">
                        <option value="" disabled="" selected="">Almacen</option>
                        @foreach($almacen as $al)                
                        <option value="{{$al->id}}">{{$al->nombre_almacen}}</option>
                        @endforeach  
                        </select>    
                    </div>
                </div>
                </div>
         
            <div class="row">

                

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Color</label>
                        <select  class="form-control selectpicker" name="pColor_idColor" id="pColor_idColor" data-live-search="true">
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
                        <select  class="form-control selectpicker" name="pTallas_idTallas" id="pTallas_idTallas" data-live-search="true">
                        <option value="" disabled="" selected="">Talla</option>
                        @foreach($talla as $t)                
                        <option value="{{$t->id}}">{{$t->nom_talla}}</option>
                        @endforeach  
                        </select>                         
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Precio</label>
                    <div class="input-group">
                        <span class="input-group-addon">S/.</span>
                        <input type="text" class="form-control" name="pprecio_unitario" id="pprecio_unitario" aria-label="Amount (to the nearest dollar)" placeholder="Precio Unitario">                      
                    </div>
                </div>
            </div>
            <div class="row">
                
                
                <div class="col-md-4">
                    <div class="input-group" style="margin-top: 35px">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>                        
                    </div>
                </div>
            </div>
     </div>
   
 </div>

        <div class="col-lg-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color:#A9D0F5">
                                               <th>Opciones</th>
                                                <th>Producto</th>
                                                <th>Almacen</th>
                                                <th>Cod. Barras</th>
                                                <th>Talla</th>
                                                <th>Color</th>
                                               
                                                <th>Precio</th>
                                                
                                                
                                                
                                            </thead>
                                            <tfoot>
                                                <th></th>
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
                                </div>
                            </div>
                        </div>


                    </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
       <div class="from-group">
            <input name"_token" value="{{ csrf_token() }}" type="hidden"></input>
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


$("#guardar").show();

function agregar()
{
    
    idProducto=$("#pidDetalle_produto").val();
    producto=$("#pidDetalle_produto option:selected").text();
    codigo=$("#pCodigoB_Producto").val();
    idTalla=$("#pTallas_idTallas").val();
    talla=$("#pTallas_idTallas option:selected").text();
    idColor=$("#pColor_idColor").val();
    color=$("#pColor_idColor option:selected").text();
    idAlmacen_idAlmacen=$("#pAlmacen_idAlmacen").val();
    almacen=$("#pAlmacen_idAlmacen option:selected").text();
    
    precio=$("#pprecio_unitario").val();
    
   

    if(idProducto!="" )
    {
       
   var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idDetalle_produto[]" value="'+idProducto+'">'+producto+'</td> <td><input type="hidden" name="Almacen_idAlmacen[]" value="'+idAlmacen_idAlmacen+'">'+almacen+'</td> <td><input type="hidden" name="CodigoB_Producto[]" value="'+codigo+'">'+codigo+'</td> <td><input type="hidden" name="Tallas_idTallas[]" value="'+idTalla+'">'+talla+'</td> <td><input type="hidden" name="Color_idColor[]" value="'+idColor+'">'+color+'</td>  <td><input type="hidden" name="precio_unitario[]" value="'+precio+'">'+precio+'</td> </tr>';

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
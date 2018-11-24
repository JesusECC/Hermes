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
                <div class="col-lg-3">
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
                
                
                <div class="col-md-5">
                    <div class="form-group">
                        <label>WIP</label>
                        <input type="text" name="WIP" id="wip" class="form-control" placeholder="Ingrese Lugar">                    
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
                        <input type="text" name="pcodigoP" id="pcodigoP" class="form-control" placeholder="Codigo Producto">                    
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
            <div class="col-md-2">
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
            
                <div class="col-md-2">
                    <div class="from-group">
                        <label>stock</label>
                        <input type="text" name="pstockP" id="pstockP" class="form-control" placeholder="cantidad">
                    </div>                    
                </div>
                <div class="col-md-3">
                    <div class="from-group">
                        <label>Cantidad</label>
                        <input type="text" name="pcantidadPF" id="pcantidadPF" class="form-control" placeholder="cantidad">
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
                    <th>Taller</th>
                 
                    <th>Cod.Producto</th>
                    <th>Producto</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Cant.</th>
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
                document.getElementById('pcodigoP').value = response.consulta[0]['codigo_Prod'];
                document.getElementById('ptalla').value = response.consulta[0]['nom_talla'];
                document.getElementById('pcolor').value = response.consulta[0]['nombre_color'];
                document.getElementById('pstockP').value = response.consulta[0]['stockP'];

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
    codigob=$("#pcodigo").val();
    idAlmacen=$("#pidAlmacen").val();
    almacen=$("#pidAlmacen option:selected").text();
    idTaller=$("#pidTaller").val();
    taller=$("#pidTaller option:selected").text();
    codigo=$("#pcodigoP").val();
    produco=$("#pnproducto").val();
    talla=$("#ptalla").val();
    color=$("#pcolor").val();
    cantidad=$("#pcantidadPF").val();
    trabajador=$("#idTrabajador").val();

    
    if(idAlmacen!="" && idTaller!=""  && talla!="" && color!="")
    {
       

       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="codigo_bar[]" value="'+codigob+'">'+codigob+'</td>  <td><input type="hidden" name="idTaller[]" value="'+idTaller+'">'+taller+'</td>  <td><input type="hidden" name="codigoSMP[]" value="'+codigo+'">'+codigo+'</td> <td><input type="hidden" name="productoSMP[]" value="'+produco+'">'+produco+'</td> <td><input type="hidden" name="tallaSMP[]" value="'+talla+'">'+talla+'</td> <td><input type="hidden" name="colorSMP[]" value="'+color+'">'+color+'</td> <td><input type="hidden" name="cantidadSMP[]" value="'+cantidad+'">'+cantidad+'</td> </tr>';

       cont++;

       var dat={codigob:codigob,idAlmacen:idAlmacen,idTaller:idTaller,codigo:codigo,produco:produco,talla:talla,color:color,cantidad:cantidad,trabajador:trabajador};
        
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
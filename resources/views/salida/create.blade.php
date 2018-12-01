 @extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Salida Materia Prima</a></li>
            <li class="breadcrumb-item ">Registro Salida Materi Prima</li>
            
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Salida del Producto Materia Prima</h4>
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
        <h4 class="card-title">Datos de Salida</h4>
        <div class="form-body">
            <div class="row p-t-10">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="proveedor">Trabajador</label>
                        <input type="hidden" name="idTrabajador" id="idTrabajador" class="form-control" value="{{ $usuario[0]->id }}">
                        <input type="text" name="Nombres" id="Nombres" class="form-control" value="{{ $usuario[0]->nombre }} {{ $usuario[0]->apellidos }}" readonly >
                        
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
                        <label for="proveedor">Taller</label>
                        <select name="idTaller" id="pidTaller" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected="" disabled="">Seleccione</option>
                             @foreach($taller as $ta)>
                                 <option value="{{$ta->idTA}}">{{$ta->codigoT.' '.$ta->nombre_taller}}</option>
                             @endforeach
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
            <div class="col-md-3">
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
                <button class="btn btn-primary" id="save" type="button">guardar</button>
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
// declacracion de variables

var cont=0;
var filaob=[];

function consulBarras(){
    codBarras=$("#pcodigo").val();
    $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{codBarras:codBarras}, //datos que se envian a traves de ajax
        url:'barras', //archivo que recibe la peticion
        type:'post', //método de envio
        dataType:"json",//tipo de dato que envio 
        beforeSend: function () {
            // console.log('procesando');
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

                // console.log( response.consulta);
            }                
        }
      });
}


$("#guardar").show();

function agregar()
{
    codigob=$("#pcodigo").val();
    idTaller=$("#pidTaller").val();
    taller=$("#pidTaller option:selected").text();
    codigo=$("#pcodigoP").val();
    produco=$("#pnproducto").val();
    talla=$("#ptalla").val();
    color=$("#pcolor").val();
    cantidad=$("#pcantidadPF").val();


    
    if(idTaller!=""  && talla!="" && color!="")
    {
       
        
        var fila=
                '<tr class="selected" id="fila'+cont+'">'+
                    '<td>'+
                        '<button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button>'+
                    '</td> '+
                    '<td>'+
                        '<input type="hidden" name="codigo_bard[]" value="'+codigob+'">'+codigob+
                    '</td>  '+
                    '<td>'+
                        '<input type="hidden" name="idTaller[]" value="'+idTaller+'">'+taller+'</td>  '+
                    '<td>'+
                        '<input type="hidden" name="codigoSMP[]" value="'+codigo+'">'+codigo+'</td>'+
                    '<td>'+
                        '<input type="hidden" name="productoSMP[]" value="'+produco+'">'+produco+'</td> '+
                    '<td>'+
                        '<input type="hidden" name="tallaSMP[]" value="'+talla+'">'+talla+'</td> '+
                    '<td>'+
                        '<input type="hidden" name="colorSMP[]" value="'+color+'">'+color+'</td> '+
                    '<td>'+
                        '<input type="hidden" name="cantidadSMP[]" value="'+cantidad+'">'+cantidad+'</td>'+
                '</tr>';


        cont++;
        var dato={codigob:codigob,taller:taller,codigo:codigo,produco:produco,talla:talla,color:color,cantidad:cantidad};    
        filaob.push(dato);
        limpiar();
        evaluar();
        $('#detalles').append(fila);
        // console.log(filaob);

    }
    else
    {
        alert("erros al ingresar el detale del ingreso, revise los datos del articulo");
    }
}
function guardar(){
    var idTaller=$("#pidTaller").val();
    var idTrabajador=$("#idTrabajador").val();
    var pidAlmacen=$("#pidAlmacen").val();
    
    var vari=[{idTaller:idTaller,idTrabajador:idTrabajador,pidAlmacen:pidAlmacen}];
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
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection
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
    </div>
    <div class="card-body">
        <h4 class="card-title">Datos del Producto</h4>
        <div class="form-body">
            <div class="row p-t-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nombre Producto</label>
                        <input type="text" id="b" class="form-control" placeholder="Nombre Almacen">
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label">Codigo</label>
                            <input type="text" id="a" class="form-control" placeholder="Asignar un codigo">
                        </div>                        
                    </div>
                </div>

            </div>
            <div class="row p-t-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tipo Producto</label>
                        <select  class="form-control selectpicker" id="d" data-live-search="true">
                            <option value="" disabled="" selected="">Tipo Producto</option>
                            @foreach($tipoproducto as $tp)                
                            <option value="{{$tp->id}}">{{$tp->nombreTP}}</option>
                            @endforeach  
                        </select>   
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Almacen</label>
                        <select  class="form-control selectpicker" id="g" data-live-search="true">
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
                        <input type="text" id="a" class="form-control" placeholder="Asignar un marca">                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                        <input type="text" id="a" class="form-control" placeholder="Asignar un categoria">                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Color</label>
                        <select  class="form-control selectpicker" id="j" data-live-search="true">
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
                        <select  class="form-control selectpicker" id="i" data-live-search="true">
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
                        <input type="text" class="form-control" id="a" aria-label="Amount (to the nearest dollar)" placeholder="Precio Unitario">                      
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">%</span>
                        <input type="text" id="a" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Asignar un descuento">                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" id="a" class="form-control" placeholder="Ingrese Stock">                        
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light btn-success pull-right" id="save">Agregar</button>
    </div>
</div>                            
@push('scripts')
<script>
    
        $('#save').click(function(){
            saveAlamcen();
        });
        
        $('#su').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#su').click(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
       
        // Actualizar
       

    });

    function saveAlamcen(){
        
        // se enviar los datos al controlador empleados
        var codigo=$("#a").val();
        var nombrea=$("#b").val();
        var idTienda=$("#g").val();
        var direccion=$("#c").val();
        var departamento=$("#d").val();
        var provincia=$("#f").val();
        var distrito=$("#e").val();
        var numero=$("#h").val();
        var tipo=$("#i").val();
        var operador=$("#j").val();
        

          
        if(departamento!=''){
        var dat=[{nombrea:nombrea,departamento:departamento,distrito:distrito,provincia:provincia,direccion:direccion,codigo:codigo,idTienda:idTienda,numero:numero,tipo:tipo,operador:operador}];
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
@endpush
@endsection
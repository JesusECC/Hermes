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
     <button id="save" type="sumbit" class="btn waves-effect waves-light btn-success pull-right"><i class="far fa-save"></i>Agregar</button>
  </div>
  <div class="card-body">
   
                                    <div class="form-body">
                                        <h3 class="card-title">Datos Generales</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Codigo</label>
                                                    <input type="text" id="a" class="form-control" placeholder="Asignar un codigo">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre Almacen</label>
                                                    <input type="text" id="b" class="form-control" placeholder="Nombre Almacen">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tienda</label>
                                                <select  class="form-control selectpicker" id="g" data-live-search="true">
                                                <option value="" disabled="" selected="">Tienda</option>
                                                @foreach($tienda as $ti)                
                                                <option value="{{$ti->id}}">{{$ti->nombre_tienda}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>
                                     </div>


                                 <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Telefono </label>
                                                    <input type="text" id="h" class="form-control" placeholder="Nombre Almacen">
                                                    </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tienda</label>
                                                <select  class="form-control selectpicker" id="i" data-live-search="true">
                                                <option value="" disabled="" selected="">Tipo Telefono</option>
                                                @foreach($tipotelefono as $tt)                
                                                <option value="{{$tt->id}}">{{$tt->nombre_tipo}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tienda</label>
                                                <select  class="form-control selectpicker" id="j" data-live-search="true">
                                                <option value="" disabled="" selected="">Operador</option>
                                                @foreach($operador as $op)                
                                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>


                                        </div>
                                       
                                        <!--/row-->
                                        <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Direccion</label>
                                                    <input type="text" id="c" class="form-control" placeholder="Ingresar Direccion">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                  
                                                <select  class="form-control selectpicker" id="d" data-live-search="true">
                                                <option value="" disabled="" selected="">Departamento</option>
                                                @foreach($departamento as $de)                
                                                <option value="{{$de->id}}">{{$de->nombre_departamento}}</option>
                                                @endforeach  
                                                </select>   
                                                </div>
                                            </div>
                                        
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    
                                                <select  class="form-control selectpicker" id="f" data-live-search="true">
                                                <option value="" disabled="" selected="">Provincia</option>
                                                @foreach($provincia as $pr)                
                                                <option value="{{$pr->id}}">{{$pr->nombre_provincia}}</option>
                                                @endforeach  
                                                </select>  
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    
                                                    <select  class="form-control selectpicker" id="e" data-live-search="true">
                                                <option value="" disabled="" selected="">Distrito</option>
                                                @foreach($distrito as $dis)                
                                                <option value="{{$dis->id}}">{{$dis->nombre_distrito}}</option>
                                                @endforeach  
                                                </select>  
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->

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
@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Cliente</a></li>
            <li class="breadcrumb-item ">Cliente </li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Registrar Cliente</h4>
    </div>
  <div class="card-body">
    <h4 class="card-title">Datos del Cliente</h4>
        <div class="form-body">
            <form action="{{ route('cliente-guardar') }}" method="post" >
                    @csrf
                    <div class="row p-t-10">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombe Cliente</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres del Cliente">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Apellidos Cliente</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos del Cliente">
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Fecha de Nacimiento</label>
                                <input type="date" id="fecnaci" class="form-control" placeholder="">
                            </div>
                        </div>
                         <div class="col-md-4 ">
                            <div class="form-group">
                                <label class="control-label">Tipo Documento</label>
                              
                            <select  class="form-control selectpicker" id="tipodocumento" data-live-search="true">
                            <option value="" disabled="" selected="">seleccione Documento</option>
                            @foreach($tipo_documento as $td)                
                            <option value="{{$td->id}}">{{$td->nombre_TD}}</option>
                            @endforeach  
                            </select>   
                            </div>
                        </div>

                        <div class="col-md-4">
                              <div class="form-group">
                                    <label class="control-label">Tipo Cliente</label>
                                  
                                <select  class="form-control selectpicker" id="tipocliente" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione</option>
                                @foreach($tipo_cliente as $tpclien)                
                                <option value="{{$tpclien->id}}">{{$tpclien->nombre}}</option>
                                @endforeach  
                                </select>   
                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="group">
                                <label class="control-label">Número Doc.</label>
                                <input type="text" name="nro_documento" id="nro_documento" class="form-control" placeholder="Número de Doc.">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="group">
                                <label class="control-label">Sexo</label>
                                <input type="text" name="sexo" id="sexo" class="form-control" placeholder="Sexo">
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Departamento</label>
                                  
                                <select  class="form-control selectpicker" id="departamento" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione</option>
                                @foreach($departamento as $depa)                
                                <option value="{{$depa->id}}">{{$depa->nombre_departamento}}</option>
                                @endforeach  
                                </select>   
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label class="control-label">Provincia</label>
                                  
                                <select  class="form-control selectpicker" id="provincia" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione</option>
                                @foreach($provincia as $pro)                
                                <option value="{{$pro->id}}">{{$pro->nombre_provincia}}</option>
                                @endforeach  
                                </select>   
                                </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                    <label class="control-label">Distrito</label>
                                  
                                <select  class="form-control selectpicker" id="distrito" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione</option>
                                @foreach($distrito as $dis)                
                                <option value="{{$dis->id}}">{{$dis->nombre_distrito}}</option>
                                @endforeach  
                                </select>   
                                </div>
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Dirección</label>
                                <input type="text" name="nombre_direccion" id="nombre_direccion" class="form-control" placeholder="Dirección">
                            </div>  
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-4">
                           <div class="form-group">
                                    <label class="control-label">Tipo Telefono</label>
                                  
                                <select  class="form-control selectpicker" id="tipotelefono" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione</option>
                                @foreach($tipo_telefono as $tptele)                
                                <option value="{{$tptele->id}}">{{$tptele->nombre_tipo}}</option>
                                @endforeach  
                                </select>   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                    <label class="control-label">Operador</label>
                                  
                                <select  class="form-control selectpicker" id="operador" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione</option>
                                @foreach($operador as $oper)                
                                <option value="{{$oper->id}}">{{$oper->nombre_operador}}</option>
                                @endforeach  
                                </select>   
                                </div>
                            </div>

                  
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Número Teléfonico</label>
                                <input type="text" name="numero_telefonico" id="numero_telefonico" class="form-control" placeholder="Número">
                            </div>  
                        </div>                        
                    </div>                    
                     <button id="save" type="sumbit" class="btn waves-effect waves-light btn-success pull-right"><i class="far fa-save"></i>Agregar</button>           
     </form>     
        </div>
    </div>
</div>


@push('scripts')
<script>
    
        $('#save').click(function(){
            saveCliente();
        });
        
        $('#su').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#su').click(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
       
        // Actualizar
       

    });

    function saveCliente(){
        
        // se enviar los datos al controlador empleados

                var nombre=$("#nombre").val();
                var apellidos=$("#apellidos").val();
                var fecnaci=$("#fecnaci").val();
                var tipodocumento=$("#tipodocumento").val();
                var tipocliente=$("#tipocliente").val();
                var nro_documento=$("#nro_documento").val();
                var sexo=$("#sexo").val();
                var departamento=$("#departamento").val();
                var provincia=$("#provincia").val();
                var distrito=$("#distrito").val();
                var nombre_direccion=$("#nombre_direccion").val();
                var tipotelefono=$("#tipotelefono").val();
                var operador=$("#tipotelefono").val();
                var numero_telefonico=$("#tipotelefono").val();
   

          
        if(departamento!=''){
        var dat=[{nombre:nombre,apellidos:apellidos,fecnaci:fecnaci,tipodocumento:tipodocumento,tipocliente:tipocliente,nro_documento:nro_documento,sexo:sexo,departamento:departamento,provincia:provincia,distrito:distrito,nombre_direccion:nombre_direccion,tipotelefono:tipotelefono,operador:operador,numero_telefonico:numero_telefonico}];
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
                            
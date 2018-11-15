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
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" placeholder="">
                            </div>
                        </div>
                         <div class="col-md-4 ">
                            <div class="form-group">
                                <label class="control-label">Tipo Documento</label>
                              
                            <select  class="form-control selectpicker" id="idTipo_documento" name="idTipo_documento" data-live-search="true">
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
                                  
                                <select  class="form-control selectpicker" id="tipocliente" name="tipocliente" data-live-search="true">
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
                                <select  class="form-control selectpicker" id="sexo" nama="sexo" data-live-search="true">
                                    <option value="" disabled="" selected="">Seleccione</option>
                                    <option value="M"  selected="">Masculino</option>
                                    <option value="F"  selected="">Femenino</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Departamento</label>
                                  
                                <select  class="form-control selectpicker" id="departamento" name="departamento" data-live-search="true">
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
                                <select  class="form-control selectpicker" id="provincia" name="provincia" data-live-search="true">
                                    <option value="" disabled="" selected="">Seleccione</option>
                                </select>   
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Distrito</label>                                  
                                <select  class="form-control selectpicker" id="distrito" name="distrito" data-live-search="true">
                                    <option value="" disabled="" selected="">Seleccione</option>
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
                                  
                                <select  class="form-control selectpicker" id="tipotelefono" name="tipotelefono" data-live-search="true">
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
                                  
                                <select  class="form-control selectpicker" id="operador" name="operador" data-live-search="true">
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
    // $('#departamento').click(function(){
    //         console.log('departamento');
    // });

    // $("#departamento").change(console.log('entre'));

    var selectDepartamento = document.getElementById('departamento');
    selectDepartamento.addEventListener('change',function(){
        var selectedOption = this.options[selectDepartamento.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        var id=selectedOption.value;
        console.log(id);
        provincia(id);
        
    });
    var selectProvincia = document.getElementById('provincia');
    selectProvincia.addEventListener('change',function(){
        var selectedOption = this.options[selectProvincia.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        var id=selectedOption.value;
        console.log(id);
        distrito(id);        
    });
    $('#save').click(function(){
        console.log($("#simbolo").val());
    });

    function provincia(idDepartamento){
        console.log(idDepartamento,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{departamento:idDepartamento}, //datos que se envian a traves de ajax
            url:'departamento', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response.veri==true){

                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var provincia=response.provincia;
                    var va;
                    // console.log(response.provincia,response.veri);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in provincia){
                        va+='<option value="'+provincia[i]['id']+'">'+provincia[i]['nombre_provincia']+'</option>';                 
                    }
                    $("#provincia").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }
    function distrito(idProvincia){
        console.log(idProvincia,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{Provincia:idProvincia}, //datos que se envian a traves de ajax
            url:'distrito', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response.veri==true){

                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var distrito=response.distrito;
                    var va;
                    // console.log(response.distrito,response.veri);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in distrito){
                        va+='<option value="'+distrito[i]['id']+'">'+distrito[i]['nombre_distrito']+'</option>';      
                    }
                    $("#distrito").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }


</script>
@endpush
@endsection
                            
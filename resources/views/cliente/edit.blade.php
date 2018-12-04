@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Editar Cliente</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Clientes</a></li>
            <li class="breadcrumb-item ">Editar CLiente</li>
            
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Cliente</h4>
     
  </div>
    <div class="card-body">
        <div class="form-body">
               <form action="{{ route('cliente-update',$cliente->id) }}" method="post" >
                @csrf

                                         <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                     <input type="text" name="nombreper" id="nombreper" class="form-control" value="{{$telecliente[0]->nombreper}}">  
                                                </div>
                                            </div>

                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Apellidos</label>
                                                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{$telecliente[0]->apellidos}}">
                                                 </div>
                                             </div>                                            
                                             <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha de Nacimiento</label>
                                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"  value="{{$telecliente[0]->fecha_nacimiento}}">                
                                                    </div>
                                             </div>
                                         </div>
                                        
                                         <div class="row p-t-20">
                                              <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">sexo</label>
                                                        <select class="select2" style="width: 100%" name="sexo" id="sexo">
                                                            <option >Seleccione</option>
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Maculino</option>
                                                        </select>              
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tipo de Telefono</label>
                                                                <select  class="select2" id="idTipo_telefono" name="idTipo_telefono" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                                @foreach($tipotelefono as $tt)                
                                                                <option value="{{$tt->id}}">{{$tt->nombre_tipo}}</option>
                                                                @endforeach  
                                                                </select>    
                                                        </div>
                                               </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Telefono</label>
                                                        <input type="text" id="numero" name="numero" class="form-control"  value="{{$telecliente[0]->numero}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row p-t-20">
                                                     <div class="col-md-4">
                                                        <div class="form- group">
                                                            <label>Operador</label>
                                                                <select  class="select2" id="idTipooperador" name="idTipooperador" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                                                @foreach($operador as $op)                
                                                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                                                @endforeach  
                                                                </select>    
                                                        </div>
                                                      </div>
                                                   
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tipo de cliente</label>
                                                                <select  class="select2" id="tipocliente" name="tipocliente" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione Tipo de cliente</option>
                                                                @foreach($tipocliente as $clie)                
                                                                <option value="{{$clie->id}}">{{$clie->nombreTC}}</option>
                                                                @endforeach  
                                                                </select>    
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
                                                         <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Direccion</label>
                                                                    <input type="text" id="nombre_direccion" name="nombre_direccion" class="form-control"  value="{{$telecliente[0]->nombre_direccion}}">
                                                                </div>
                                                         </div>
                                                    </div>
                                                      <div class="row p-t-20">
                                                            <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tipo de Documento</label>
                                                                                <select  class="select2" id="idTipo_documento" name="idTipo_documento" data-live-search="true">
                                                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                                                @foreach($tipodocumento as $tt)                
                                                                                <option value="{{$tt->id}}">{{$tt->nombre_TD}}</option>
                                                                                @endforeach  
                                                                                </select>    
                                                                        </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">N°Documento</label>
                                                                    <input type="text" id="nro_documento" name="nro_documento" class="form-control"  value="{{$telecliente[0]->nro_documento}}">
                                                                 </div>
                                                             </div> 
                                                             <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Estado</label>
                                                                                <select  class="select2" id="estado_idEstado" name="estado_idEstado" data-live-search="true">
                                                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                                                @foreach($estado as $est)                
                                                                                <option value="{{$est->id}}">{{$est->descripcion}}</option>
                                                                                @endforeach  
                                                                                </select>    
                                                                        </div>
                                                               </div>  
                                                       </div>
                                        <input type="hidden" name="perid" value="{{$telecliente[
                                            0]->perid}}">
                                         <input type="hidden" name="tcid" value="{{$telecliente[
                                            0]->tcid}}">
                                          <input type="hidden" name="estid" value="{{$telecliente[
                                            0]->estid}}">
                                             <input type="hidden" name="direid" value="{{$telecliente[
                                            0]->direid}}">
                                             <input type="hidden" name="tepid" value="{{$telecliente[
                                            0]->tepid}}">
                                      
                                            
                                           



                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Actualizar</button>
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
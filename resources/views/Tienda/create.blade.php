 @extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tienda</a></li>
            <li class="breadcrumb-item ">Registrar Tienda</li>
            
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Tienda</h4>
     
  </div>
    <div class="card-body">
        <div class="form-body">
            
         <form action="{{ route('proveedor-store') }}" method="post" >
                   @csrf
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                 <div class="form-group">
                                 <label class="control-label">Codigo</label>
                                 <input type="text" name="codigo_tienda" id="condigo_tienda" class="form-control" placeholder="Asignar un codigo">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="control-label">Nombre Tienda</label>
                                <input type="text" id="nombre_tienda" name="nombre_tienda" class="form-control" placeholder="Nombre Tienda">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de Tienda</label>
                                    <select  class="form-control selectpicker" id="idTipo_tienda" name="idTipo_tienda"data-live-search="true">
                                    <option value="" disabled="" selected="">Seleccione Tipo de Tienda</option>
                                    @foreach($tipotienda as $tie)                
                                    <option value="{{$tie->id}}">{{$tie->nombre}}</option>
                                    @endforeach  
                                    </select>    
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de Telefono</label>
                                    <select  class="form-control selectpicker" id="idTipo_telefono" name="idTipo_telefono" data-live-search="true">
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
                                <input type="text" id="numero" name="numero" class="form-control" placeholder="Ingrese numero Telefono">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Operador</label>
                                <select  class="form-control selectpicker" id="idTipooperador" name="idTipooperador" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                @foreach($operador as $op)                
                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                @endforeach  
                                </select>    
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Departamento</label>
                                <select  class="form-control selectpicker" id="departamento" name="departamento" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione Departamento</option>
                                @foreach($departamento as $de)                
                                <option value="{{$de->id}}">{{$de->nombre_departamento}}</option>
                                @endforeach  
                                </select>    
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Provincia</label>
                                <select  class="form-control selectpicker" id="provincia" name="provincia" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione Provincia</option>
                                @foreach($provincia as $pro)                
                                <option value="{{$pro->id}}">{{$pro->nombre_provincia}}</option>
                                @endforeach  
                                </select>    
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                            <label>Distrito</label>
                                <select  class="form-control selectpicker" id="distrito" name="distrito" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione Distrito</option>
                                @foreach($distrito as $dis)                
                                <option value="{{$dis->id}}">{{$dis->nombre_distrito}}</option>
                                @endforeach  
                                </select>    
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Direccion</label>
                                <input type="text" id="direccionAL" name="direccionAL" class="form-control" placeholder="Ingrese la Direccion">
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
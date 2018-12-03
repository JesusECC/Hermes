@extends('layouts.admin')
@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Almacenes</a></li>
            <li class="breadcrumb-item ">Almacen</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Almacen</h4>
  </div>

  <div class="card-body">
    <div class="form-body">
        <form action="{{ route('almacen-store') }}" method="post" >
                   @csrf

                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">


                                <label class="control-label">Codigo del Almacen</label>
                                <input type="text" id="a" class="form-control" placeholder="Asignar un codigo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre del Almacen</label>
                                <input type="text" id="b" class="form-control" placeholder="Nombre Almacen">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tienda Perteneciente</label>
                                <select  class="form-control selectpicker" id="g" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione Tienda</option>
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
                                <input type="text" id="h" class="form-control" placeholder="Telefono del Almacen">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de Telefono</label>
                                <select  class="form-control selectpicker" id="i" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione Tipo</option>
                                @foreach($tipotelefono as $tt)                
                                <option value="{{$tt->id}}">{{$tt->nombre_tipo}}</option>
                                @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Operador</label>
                                <select  class="form-control selectpicker" id="j" data-live-search="true">
                                <option value="" disabled="" selected="">Seleccione Operador</option>
                                @foreach($operador as $op)                
                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                @endforeach  
                                </select> 
                            </div>
                        </div>
                    </div>
                    <h3 class="box-title m-t-40">Dirección</h3>
                    <div class="row">
                        <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" id="c" class="form-control" placeholder="Ingresar Direccion">
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

                <button id="save" type="sumbit" class="btn waves-effect waves-light btn-success pull-right"><i class="far fa-save"></i>Agregar</button>


           </form> 
        </div>
    </div>
</div>
                                        

@push('scripts')

<script>
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
        var departamento=$("#departamento").val();
        var provincia=$("#provincia").val();
        var distrito=$("#distrito").val();
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
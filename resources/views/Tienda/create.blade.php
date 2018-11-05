
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
     <h4 class="card-title pull-left">Registrar Tienda</h4>
   <button id="save" type="sumbit" class="btn waves-effect waves-light btn-success pull-right"><i class="far fa-save"></i>Agregar</button>
  </div>
  <div class="card-body">
                                <form action="#">
                                    <div class="form-body">
                                        <h3 class="card-title">Registro</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Codigo</label>
                                                    <input type="text" id="codi" class="form-control" placeholder="Asignar un codigo">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre Tienda</label>
                                                    <input type="text" id="nomtienda" class="form-control" placeholder="Nombre Tienda">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tipo de Tienda</label>
                                                <select  class="form-control selectpicker" id="tptienda" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Tipo de tienda</option>
                                                @foreach($tipotienda as $tie)                
                                                <option value="{{$tie->id}}">{{$tie->nombre}}</option>
                                                @endforeach  
                                                </select>    
                                                </div>
                                            </div>
                                         <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tipo de Telefono</label>
                                                <select  class="form-control selectpicker" id="tipotele" data-live-search="true">
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
                                                    <input type="text" id="tele" class="form-control" placeholder="Ingrese numero Telefono">
                                                    </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Operador</label>
                                                <select  class="form-control selectpicker" id="oper" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                                @foreach($operador as $op)                
                                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                         </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Departamento</label>
                                                <select  class="form-control selectpicker" id="depart" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Departamento</option>
                                                @foreach($departamento as $de)                
                                                <option value="{{$de->id}}">{{$de->nombre_departamento}}</option>
                                                @endforeach  
                                                </select>    
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Distrito</label>
                                                <select  class="form-control selectpicker" id="dist" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Distrito</option>
                                                @foreach($distrito as $dis)                
                                                <option value="{{$dis->id}}">{{$dis->nombre_distrito}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Provincia</label>
                                                <select  class="form-control selectpicker" id="pro" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Provincia</option>
                                                @foreach($provincia as $pro)                
                                                <option value="{{$pro->id}}">{{$pro->nombre_provincia}}</option>
                                                @endforeach  
                                                </select>    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Direccion</label>
                                                    <input type="text" id="dire" class="form-control" placeholder="Ingrese la Direccion">
                                                    </div>
                                            </div>


                                     </div>
                                </form>     
  </div>
  <div class="card-footer">
        <button type="button" class="btn waves-effect waves-light btn-info pull-right m-r-5">Volver</button>
        <button type="button" class="btn waves-effect waves-light btn-danger pull-right m-r-5">Cancelar</button>
        <button type="submit" id="save"class="btn waves-effect waves-light btn-success pull-right m-r-5">Agregar</button>
    </div>
</div>


@push('scripts')

<script>
    
            $('#save').click(function(){
            saveTienda();
        });
        
        
        $('#su').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#su').click(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
       
        // Actualizar
      

    });

          function saveTienda(){
       

         var codigo=$("#codi").val();
        var nombrea=$("#nomtienda").val();
        var tptienda=$("#tptienda").val();
        var tipotele=$("#tipotele").val();
        var opera=$("#oper").val();
        var tele=$("#tele").val();
        var departamento=$("#depart").val();
        var distrito=$("#dist").val();
         var provincia=$("#pro").val();
        var direcc=$("#dire").val();
      
     
        if(departamento!=''){
        var dat=[{codigo:codigo,nombrea:nombrea,tptienda:tptienda,tipotele:tipotele,opera:opera,tele:tele,departamento:departamento,distrito:distrito,provincia:provincia,direcc:direcc}];
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
                        alert("problemas al guardar el registro");
                    }
                }
            });
        }
    }
    var bool;
    
   
</script>
@endpush
@endsection
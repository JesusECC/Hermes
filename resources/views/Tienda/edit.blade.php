
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
     <button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
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
                                                    <label>Tipo de Telefono</label>
                                                <select  class="form-control selectpicker" id="tipotele" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                @foreach($tipotelefono as $tt)                
                                                <option value="{{$tt->idTipo_telefono}}">{{$tt->nombre_tipo}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Operador</label>
                                                <select  class="form-control selectpicker" id="oper" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                                @foreach($operador as $op)                
                                                <option value="{{$op->idoperador}}">{{$op->nombre_operador}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                         </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Telefono</label>
                                                    <input type="text" id="tele" class="form-control" placeholder="Nombre Tienda">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Departamento</label>
                                                <select  class="form-control selectpicker" id="depart" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Departamento</option>
                                                @foreach($departamento as $de)                
                                                <option value="{{$de->idDepartamento}}">{{$de->nombre_departamento}}</option>
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
                                                <option value="{{$dis->idDistrito}}">{{$dis->nombre_distrito}}</option>
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
                                                <option value="{{$pro->idProvincia}}">{{$pro->nombre_provincia}}</option>
                                                @endforeach  
                                                </select>    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Direccion</label>
                                                    <input type="text" id="b" class="form-control" placeholder="Nombre Tienda">
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
@endsection


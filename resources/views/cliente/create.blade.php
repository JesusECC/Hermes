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
                                <input type="date" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="group">
                                <label class="control-label">Tipo de Documento</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="" selected="">Seleccione</option>
                                        <option value="AK">RUC</option>
                                        <option value="HI">DNI</option>
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
                                <select class="select2" style="width: 100%">
                                    <option disabled="" selected="">Seleccione</option>
                                    <option value="AK">RUC</option>
                                    <option value="HI">DNI</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Provincia</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="" selected="">Seleccione</option>
                                    <option value="AK">RUC</option>
                                    <option value="HI">DNI</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Distrito</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="" selected="">Seleccione</option>
                                    <option value="AK">RUC</option>
                                    <option value="HI">DNI</option>
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
                                <label class="control-label">Tipo Teléfono</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="" selected="">Seleccione</option>
                                    <option value="AK">RUC</option>
                                    <option value="HI">DNI</option>
                                </select> 
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Operador</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="" selected="">Seleccione</option>
                                    <option value="AK">RUC</option>
                                    <option value="HI">DNI</option>
                                </select> 
                            </div>  
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Número Teléfonico</label>
                                <input type="text" name="numero_telefonico" id="numero_telefonico" class="form-control" placeholder="Número">
                            </div>  
                        </div>                        
                    </div>                    
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
            </form>     
        </div>
    </div>
</div>
@endsection
                            
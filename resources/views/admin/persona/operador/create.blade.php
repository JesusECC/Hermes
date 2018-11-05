@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Persona</a></li>
            <li class="breadcrumb-item ">Configuración</li>
            <li class="breadcrumb-item active">Operador</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Operador</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            <form action="{{ route('operador-guardar') }}" method="post" >
                    @csrf
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Operador</label>
                                <input type="text" name="nombre_operador" id="nombre_operador" class="form-control" placeholder="Nombre del Color">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Glosa</label>
                                <input type="text" name="glosa" id="glosa" class="form-control" placeholder="Glosa">
                                
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
            </form>     
        </div>
    </div>
</div>
@endsection
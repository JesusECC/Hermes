@extends('layouts.admin')
@section('content')
<!-- vista create-->
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
     <h4 class="card-title pull-left">Editar Estado</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            {!! Form::model($estado, ['method'=>'POST','route' => ['estado-update',$estado->id]]) !!}
                @csrf
                <div class="row p-t-20">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                            <input type="text" name="tipo_estado" id="tipo_estado" class="form-control" value={{$estado->tipo_estado}} >                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $estado->descripcion }}" >                
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Actualizar</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
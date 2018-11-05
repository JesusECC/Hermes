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
            {!! Form::model($documento, ['method'=>'POST','route' => ['documento-update',$documento->id]]) !!}
                @csrf
                <div class="row p-t-20">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Documento</label>
                            <input type="text" name="nombre_TD" id="nombre_TD" class="form-control" value="{{ $documento->nombre_TD }}">                
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Actualizar</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
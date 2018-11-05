@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Configuración</li>
            <li class="breadcrumb-item active">Color</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Editar Color</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            <form action="{{ route('color-update') }}" method="post" >
                    @csrf
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Color</label>
                                <input type="hidden" name="id" value="{{ $color->id }}">
                                <input type="text" name="nombre_color" id="nombre_color" class="form-control" value="{{ $color->nombre_color }}">
                                <small class="form-control-feedback"> This is inline help </small> 
                            </div>
                        </div>
                    </div>  
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Actualizar</button>
            </form>     
        </div>
    </div>
</div>
@endsection
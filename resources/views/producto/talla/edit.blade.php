@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Configuración</li>
            <li class="breadcrumb-item active">Talla</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Editar Talla</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            <form action="{{ route('talla-update') }}" method="post" >
                    @csrf
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Talla</label>
                                <input type="hidden" name="id" value="{{ $talla->id }}">
                                <input type="text" name="nom_talla" id="nom_talla" class="form-control" value="{{ $talla->nom_talla}}">
                            </div>
                        </div>
                    </div>  
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Actualizar</button>
            </form>     
        </div>
    </div>
</div>
@endsection
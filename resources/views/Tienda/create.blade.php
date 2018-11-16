@extends('layouts.admin')
@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Ingresar Tienda</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tienda</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Tienda</h4>
     
  </div>
    <div class="card-body">
        <div class="form-body">
            {!! Form::open(['route'=>'tienda-store','method'=>'POST']) !!}
                  @include('Tienda.partials.fields')
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
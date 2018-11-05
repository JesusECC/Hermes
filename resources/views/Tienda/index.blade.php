@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tiendas</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listado de las Tienda</h4>
     <button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
  </div>
    <div class="card-body">
        <div class="">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Cod.Tienda</th>
                <th>Nomb Tienda</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Tipo Tienda</th>
                <th>Tipo Tefono</th>
                 <th>Operador</th>
                  <th>Opciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
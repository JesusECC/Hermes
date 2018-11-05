@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listar Productos Finales</h4>
     <a href="{{ route('cliente-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Numero Documento </th>
                        <th>Nombre   </th>
                        <th>Apellidos</th>
                        <th>sexo</th>
                        <th>Tipo Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                      @foreach($cliente as $client)
         <tr>
                <td>{{$client->nro_documento}}</td>
                <td>{{$client->nombrclient}}</td>
                <td>{{$client->apellidos}}</td>
                <td>{{$client->sexo}}</td>
                <td>{{$client->nombre}}</td>
                <td class="text-nowrap">
                            <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                            <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                            <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-eye text-success"></i> </a>
                        </td>
            </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
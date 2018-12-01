@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Cliente</a></li>
         
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Lista de Clientes</h4>
     <a href="{{ route('cliente-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>N°Documento</th>
                        <th>Direccion</th>
                        <th>Tipo Cliente</th>
                        <th>Telefono</th>
                        <th>Tipo Telefono</th>
                        <th>Operador</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
             @foreach($cliente as $client)
                <tr>
                <td>{{$client->nombreper}} {{$client->apellidos}}</td>
                <td>{{$client->nro_documento}}</td>
                <td>{{$client->nombre_direccion}} {{$client->direc}}</td>
                
                <td>{{$client->nombreTC}}</td>
                <td>{{$client->numero}}</td>
                <td>{{$client->nombre_tipo}}</td>
                <td>{{$client->nombre_operador}}</td>
                        
                 <td class="text-nowrap">
                          <a href="{{ route('cliente-edit',$client->id) }}" data-toggle="tooltip" data-original-title="Edit" ><i class="fa fa-pencil text-warning m-r-10"></i> </a>                     
                          <a href="{{ route('cliente-delete',$client->id) }}" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-close text-danger m-r-10"></i></a> 
                          
                </td>
            </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
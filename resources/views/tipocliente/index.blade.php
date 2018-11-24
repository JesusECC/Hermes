@extends('layouts.admin')
@section('content')
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
     <h4 class="card-title pull-left">Listar Tipo de Cliente</h4>
     <a href="{{ route('tipocliente-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tipocliente as $cli)
                    <tr>
                        <td>{{ $cli->id}}</td>
                        <td>{{ $cli->nombreTC}}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('tipocliente-editar',$cli->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                            <a href="{{ route('tipocliente-delete',$cli->id) }}" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                            <!-- <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-eye text-success"></i> </a> -->
                        </td>                        
                    </tr>    
                @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
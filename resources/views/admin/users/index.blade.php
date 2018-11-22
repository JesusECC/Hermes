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
     <h4 class="card-title pull-left">Lista de Usuarios</h4>
     <a href="{{ route('usuarios-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apelldos</th>
                        <th>Usuarios</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($users as $user)
                    <tr>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apellidos }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nombreRol }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('usuarios-editar',$user->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                            <a href="{{ route('usuarios-delete',$user->id) }}" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger m-r-10"></i> </a>
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
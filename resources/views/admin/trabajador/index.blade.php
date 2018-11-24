@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trabajador</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listado de las Trabajador</h4>
     <a href="{{ route('persona-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="">
            
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                        <th>Nombre</th>
                        <th>Apelldos</th>
                        <th>Tipo Documento</th>
                        <th>Numero de documento</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Sueldo</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Fin</th>
          </tr>
        </thead>
        <tbody>  
            @foreach($persona as $per)
         <tr>
                      <td>{{ $per->nombre }}</td>
                        <td>{{ $per->apellidos }}</td>
                        <td>{{ $per->idTipo_documento }}</td>
                        <td>{{ $per->nro_documento }}</td>
                        <td>{{ $per->fecha_nacimiento }}</td>
                        <td>{{ $per->sexo }}</td>
                        <td>{{ $per->sueldo }}</td>
                        <td>{{ $per->fecha_inicio }}</td>
                        <td>{{ $per->fecha_fin }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('persona-editar',$per->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                            <a href="{{ route('persona-delete',$per->idTrabajador) }}" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger m-r-10"></i> </a>
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
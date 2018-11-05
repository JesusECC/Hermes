@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Persona</a></li>
            <li class="breadcrumb-item ">Configuración</li>
            <li class="breadcrumb-item active">Operador</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listar Operador</h4>
     <a href="{{ route('operador-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Operador</th>
                        <th>Nombre Glosa</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($operador as $op)
                    <tr>
                        <td>{{ $op->id }}</td>
                        <td>{{ $op->nombre_operador }}</td>
                        <td>{{ $op->glosa }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('operador-edit',$op->id) }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                            <a href="{{ route('operador-delete',$op->id) }}" data-toggle="tooltip" data-original-title="Eliminar"> <i class="fa fa-close text-danger m-r-10"></i> </a>
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
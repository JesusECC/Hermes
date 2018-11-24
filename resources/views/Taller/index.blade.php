@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Taller</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Lista de Taller</h4>
     <a href="{{route('taller-create')}}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Lugar</th>
                        <th>Telefono</th>
                        <th>Tipo Telefono</th>
                        <th>Operado</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($taller as $tal)
                    <tr>
                    <td>{{$tal->codigoT}}</td>
                    <td>{{$tal->nombre_taller}}</td>
                    <td>{{$tal->direccionAL}}</td>
                    <td>{{$tal->direc}}</td>
                    <td>{{$tal->numero}}</td>
                    <td>{{$tal->nombre_tipo}}</td>
                    <td>{{$tal->nombre_operador}}</td>
                     <td class="text-nowrap">
                            <a href="{{ route('taller-editar',$tal->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                          <a href="{{ route('taller-delete',$tal->id) }}" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                        </td> 
                    </tr>    
				   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
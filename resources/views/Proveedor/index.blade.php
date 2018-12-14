@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Proveedor</a></li>
         
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Lista de Proveedor</h4>
     <a href="{{ route('proveedor-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>R.social</th>
                        <th>Tipo documento</th>
                        <th>numero documento</th>
                        <th>Telefono</th>
                        <th>Tipo Telefono</th>
                        <th>Operador</th>
                        <th>Direccion</th>
                        <th>Lugar</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($proveedor as $pro)
         <tr>
                <td>{{$pro->razon_social}}</td>
                <td>{{$pro->nombre_TD}}</td>
                <td>{{$pro->nro_documentoP}}</td>
                <td>{{$pro->numero}}</td>
                <td>{{$pro->nombre_tipo}}</td>
                <td>{{$pro->nombre_operador}}</td>
                <td>{{$pro->direccionAL}}</td>
                <td>{{$pro->direc}}</td>

                <td class="text-nowrap">
                             <a href="{{ route('proveedor-editar',$pro->proid) }}" data-toggle="tooltip" data-original-title="Edit" ><i class="fa fa-pencil text-warning m-r-10"></i> </a> 
                             <a href="{{ route('proveedor-delete',$pro->proid) }}" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-close text-danger m-r-10"></i></a> 
                </td>
            </tr>   
                @endforeach
            
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
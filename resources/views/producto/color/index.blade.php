@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            
            <li class="breadcrumb-item ">Configuración</li>
            <li class="breadcrumb-item active">Color</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listar Color</h4>
     <a href="{{ route('color-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        
                        <th>Nombre Color</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($color as $co)
                    <tr>
                       
                        <td>{{ $co->nombre_color }}</td>
                        <td class="text-nowrap">
                            
                            <a href="{{ route('color-delete',$co->id) }}" data-toggle="tooltip" data-original-title="Eliminar"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                        
                        </td>                        
                    </tr>    
                @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
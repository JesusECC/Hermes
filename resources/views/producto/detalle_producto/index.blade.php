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
     <h4 class="card-title pull-left">Listar de Detalle Productos </h4>
     <a href="{{ route('detalle_producto-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                     <tr>
                        
                        <th>Nom. Producto</th>
                        <th>Codigo</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                
                     @foreach($detalleproducto as $prod)
         <tr>
                <td>{{$prod->nombre_producto}}</td>
                <td>{{$prod->codigo_Prod}}</td>
                <td>{{$prod->marca_producto}}</td>
                <td>{{$prod->categoria}}</td>
                
                
                
                <td class="text-nowrap">

                <a href="" data-target="#modal-delete-{{$prod->id}}" data-toggle="modal" data-original-title="Delete" title="Eliminar Producto"><i class="fa fa-close text-danger m-r-10"></i></a>
                            
              </td>
            </tr>   
            @include('producto.detalle_producto.modal')
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
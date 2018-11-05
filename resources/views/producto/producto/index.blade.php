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
     <a href="{{ route('producto-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                     <tr>
                        <th>Cod.Producto</th>
                        <th>Nom.Producto</th>
                        <th>Nom.Almacen</th>
                        <th>Marca</th>
                        <th>Talla</th>
                        <th>Color</th>
                        <th>Stock</th>
                         <th>Precio Unitario</th>
                        <th>Tipo Producto</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                
                     @foreach($producto as $prod)
         <tr>
                <td>{{$prod->CodigoB_Producto}}</td>
                <td>{{$prod->nombre_producto}}</td>
                <td>{{$prod->nombre_almacen}}</td>
                <td>{{$prod->marca_producto}}</td>
                <td>{{$prod->nom_talla}}</td>
                <td>{{$prod->nombre_color}}</td>
                <td>{{$prod->stockP}}</td>
                <td>{{$prod->precio_unitario}}</td>
                <td>{{$prod->nombreTP}}</td>
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
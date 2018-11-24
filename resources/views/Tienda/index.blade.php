@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tiendas</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listado de las Tienda</h4>
    <a href="{{ route('tienda-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="">
            
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Cod.Tienda</th>
                <th>Nomb Tienda</th>
                <th>Telefono</th>
                 <th>Tipo Telefono</th>
                <th>Direccion</th>
                <th>Lugar</th>>
                <th>Tipo Tienda</th>
                 <th>Operador</th>
                  <th>Opciones</th>
            </tr>
        </thead>
        <tbody>  
            @foreach($tienda as $tiend)
         <tr>
                <td>{{$tiend->codigo_tienda}}</td>
                <td>{{$tiend->nombre_tienda}}</td>
                <td>{{$tiend->numero}}</td>
                <td>{{$tiend->nombre_tipo}}</td>
                <td>{{$tiend->direc}}</td>
                <td>{{$tiend->direccionAL}}</td>
                <td>{{$tiend->nombre}}</td>
                <td>{{$tiend->nombre_operador}}</td>
                <td class="text-nowrap">
                          <a href="{{ route('tienda-editar',$tiend->id) }}" data-toggle="tooltip" data-original-title="Edit" ><i class="fa fa-pencil text-warning m-r-10"></i> </a>
<<<<<<< HEAD
                         <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger m-r-10"></i> </a>    
                </td>
                        
=======
                        
                          <a href="{{ route('tienda-delete',$tiend->id) }}" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-close text-danger m-r-10"></i></a>
                </td>
>>>>>>> 3d7738a60f35f04b9188404b6096e54623625c25
            </tr>   
                @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection
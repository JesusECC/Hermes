@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Salida Materia Prima</a></li>
            
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listar Salidas Materia Prima</h4>
     <a href="{{ route('salida-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					
					
					<th>Num. Comprobante</th>
					<th>fecha</th>
					<th>Trabajador</th>
					<th>Almacen</th>
					
					<th>opciones</th>
				</thead>

				@foreach ($salida as $sa)
				

				<tr>

					
					<td>QM00-{{$sa->id}}</td>
					<td>{{$sa->fecha_SMP}}</td>
					<td>{{$sa->nombre}} {{$sa->apellidos}}</td>
					<td>{{$sa->nombre_almacen}}</td>
					
					
					<td>
					
					<a href="" data-target="#modal-delete-{{$sa->id}}" data-toggle="modal"><button class="btn btn-danger">anular</button></a>
					</td>
				</tr>
				
             @endforeach
			</table>
		</div>
		{{$salida->render()}}
	</div>
</div>

@endsection
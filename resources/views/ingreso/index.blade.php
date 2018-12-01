@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Ingreso</a></li>
         
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Lista de Ingresos</h4>
     <a href="{{ route('ingreso-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>

					<th>Num. Comprobante</th>
					<th>fecha</th>
					<th>Trabajador</th>
					<th>Alamcen</th>
					</tr>
                </thead>
                <tbody>

				@foreach ($ingresos as $ing)
				

				<tr>

					<td>IPF00{{$ing->id}}</td>
					<td>{{$ing->fecha_horaPF}}</td>
					<td>{{$ing->nombre}}</td>
					<td>{{$ing->nombre_almacen}}</td>
					<td>
					
					</a>
					
					</td>
				</tr>
			 </td>
            </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
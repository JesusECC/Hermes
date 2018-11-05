@extends ('layouts.admin')
@section ('contenido')

<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Lista de Ingresos<a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
	@include('compras.ingreso.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>fecha</th>
					<th>proveedor</th>
					<th>Comprobante</th>
					<th>impuesto</th>
					<th>total</th>
					<th>estado</th>
					<th>opciones</th>
				</thead>

				@foreach ($ingresos as $ing)
				

				<tr>

					
					<td>{{$ing->fecha_hora}}</td>
					<td>{{$ing->nombre}}</td>
					<td>{{$ing->tipo_comprobante.': '.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
					<td>{{$ing->impuesto}}</td>
					<td>{{$ing->total}}</td>
					<td>{{$ing->estado}}</td>
					<td>
					<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-primary">detalles</button>
					</a>
					<a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">anular</button></a>
					</td>
				</tr>
				@include('ventas.ingreso.modal')
             @endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection
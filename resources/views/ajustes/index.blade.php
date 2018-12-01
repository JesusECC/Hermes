@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Configuración</a></li>
            <li class="breadcrumb-item ">Ajustes</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-10">
		<div class="card">
		  <div class="card-header">
		     <h4 class="card-title pull-left">Listado de Configuracion</h4>
		  </div>
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col-6">
			  		<div class="card">
			            <div class="card-body">
			                <a href="{{route('talla-index')}}"><h4 class="card-title">Configurar Talla</h4></a>
			            </div>
			        </div>
			    </div>
			    <div class="col-6">
			        <div class="card">
			            <div class="card-body">
			                <a href="{{route('color-index')}}"><h4 class="card-title">Configurar Color</h4></a>
			            </div>
			        </div>  			
		  		</div>
		  		<div class="col-6">
			        <div class="card">
			            <div class="card-body">
			                <a href="{{route('tipocliente')}}"><h4 class="card-title">Configurar Tipo de Cliente</h4></a>
			            </div>
			        </div>  			
		  		</div>
		  		<div class="col-6">
			        <div class="card">
			            <div class="card-body">
			                <a href="{{route('tipoproducto')}}"><h4 class="card-title">Configurar Tipo de Producto</h4></a>
			            </div>
			        </div>  			
		  		</div>
		  		<div class="col-6">
			        <div class="card">
			            <div class="card-body">
			                <a href="{{route('tipotienda')}}"><h4 class="card-title">Configurar Tipo de Tienda</h4></a>
			            </div>
			        </div>  			
		  		</div>
		  	</div>
		  </div>
		</div>		
	</div>
</div>

@endsection
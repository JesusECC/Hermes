@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('ingreso-create')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Ingreso Producto Final</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('tipoingreso-create')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Ingreso Materia Prima</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('tipo_salida-create')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Salida Producto Final</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('tipo_salida_mp-create')}}">
		            <div class="d-flex flex-row">
		                <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-cart-outline"></i></div>
		                <div class="m-l-10 align-self-center">
		                    <h5 class="text-muted m-b-0">Salida Materia Prima</h5>
		                </div>
		            </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('tienda')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Ingreso Tienda</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('producto')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Productos Finales</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('persona-index')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Trabajadores</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('almacen')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Almacen</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('usuarios-index')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi mdi-account-multiple"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Usuarios</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('rol-reporte')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi  mdi-read"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Reporte</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
            	<a href="{{route('salidaVenta-create')}}">
	                <div class="d-flex flex-row">
	                    <div class="round round-lg align-self-center round-info"><i class="mdi  mdi-cart-outline"></i></div>
	                    <div class="m-l-10 align-self-center">
	                        <h5 class="text-muted m-b-0">Salida venta</h5>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
                    
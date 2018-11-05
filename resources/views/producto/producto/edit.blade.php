@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Editar Producto Finales</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Editar Color</h4>
  </div>
  <div class="card-body">
    <h4 class="card-title">Datos del Producto</h4>
        <div class="form-body">
            <form action="{{ route('producto-guardar') }}" method="post" >
                    @csrf
                    <div class="row p-t-10">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nombre del Producto</label>
                                <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Nombre del Producto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Tipo de producto</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="">Seleccione</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Almacen</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="">Seleccione</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                </select>                                
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Marca</label>
                                <input type="text" name="marca_producto" id="marca_producto" class="form-control" placeholder="Marca">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="group">
                                <label class="control-label">Categoría</label>
                                <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Categoría">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="group">
                                <label class="control-label">Color</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="">Seleccione</option>
                                        <option value="AK">Amarillo</option>
                                        <option value="HI">Rojo</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="group">
                                <label class="control-label">Talla</label>
                                <select class="select2" style="width: 100%">
                                    <option disabled="">Seleccione</option>
                                        <option value="AK">XL</option>
                                        <option value="HI">L</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Precio</label>
                                <input type="text" name="precio_unitario" id="precio_unitario" class="form-control" placeholder="Precio">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Descuento</label>
                                <input type="text" name="descuento" id="descuento" class="form-control" placeholder="Descuento">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Stock</label>
                                <input type="text" name="stock" id="stock" class="form-control" placeholder="Stock">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">BardCode</label>
                                <input type="text" name="CodigoB_Producto" id="CodigoB_Producto" class="form-control" placeholder="BardCode">
                        </div>
                    </div>
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
            </form>     
        </div>
    </div>
</div>
@endsection
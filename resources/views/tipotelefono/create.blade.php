@extends('layouts.admin')
@section('content')
<!-- vista create-->
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
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Tipo de Telefono</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            <form action="{{ route('tipotelefono-guardar') }}" method="post" >
                    @csrf
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipo Telefono</label>
                                <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Ingrese el Tipo Ingreso">
                                <small class="form-control-feedback"> This is inline help </small> 
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Glosa</label>
                                <input type="text" name="glosa" id="glosa" class="form-control" placeholder="Ingrese el Tipo Ingreso">
                                <small class="form-control-feedback"> This is inline help </small> 
                            </div>
                        </div>
                        <!--/span-->
                        
                        <!--/span-->
                    </div>
                   
                        <!--/span-->
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
            </form>     
        </div>
    
</div>
@endsection
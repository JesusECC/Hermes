@extends('layouts.admin')
@section('content')
<!-- vista create-->
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Clientes</a></li>
            <li class="breadcrumb-item ">Registro Cliente</li>
            
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Tipo de Cliente</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            <form action="{{ route('tipocliente-guardar') }}" method="post" >
                    @csrf
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipo Cliente</label>
                                <input type="text" name="rol" id="rol" class="form-control" placeholder="Ingrese el Tipo de cliente">
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
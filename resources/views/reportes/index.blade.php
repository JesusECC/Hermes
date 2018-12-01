@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">reporte</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listado De reporte</h4>
     <a href="{{ route('almacen-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
   
     <div class="card-body">
        <div class="">
            <label>INGRESO</label>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Taller</th>
                        <th>Nro. Guia</th>
                        <th>Codigo</th>
                        <th>Codigo de Barras</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Cantidad</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach($ingreso as $i)
                    <tr>
                
                        <td>{{$i->nombre_taller}}</td>
                        <td>{{$i->nro_guia_PF}}</td>
                        <td>{{$i->codigo_PF}}</td>
                        <td>{{$i->codigo_bar}}</td>
                        <td>{{$i->colorPF}}</td>
                        <td>{{$i->tallaPF}}</td>
                        <td>{{$i->cantidadPF}}</td>
                   </tr>   
                @endforeach
                    
                </tbody>
               
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Ingreso del Dia</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>   
                        <td>Total</td>
                        <td>{{$ingreso2[0]->IngresoTotal}}</td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <label>SALIDA</label>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>WIP</th>
                        <th>Codigo</th>
                        <th>Codigo de Barras</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Cantidad</th>
 
                    </tr>
                </thead>
                <tbody>
                @foreach($salida2 as $s2)
                    <tr>
                        <td>{{$s2->nombre}} {{$s2->apellidos}}</td>
                        <td>{{$s2->nombre_direccion}} {{$s2->nombre_departamento}} {{$s2->nombre_provincia}} {{$s2->nombre_distrito}}</td>
                        <td>{{$s2->codigoPV}}</td>
                        <td>{{$s2->codigo_barr}}</td>
                        <td>{{$s2->colorVP}}</td>
                        <td>{{$s2->tallaVP}}</td>
                        <td>{{$s2->cantidadPF}}</td>
                    </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Salida del Dia</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>     
                    <tr>
                        <td>Total</td>
                        <td>{{$salida[0]->SalidaTotal}}</td>
                    </tr>   
                </tbody>              
            </table>
        </div>

    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Stock Inicial</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$reporte[0]->StockTotal}}</td>
                    </tr>   
                </tbody> 
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>MAS</th> 
                    </tr>
                </thead>
                <tbody>   
                    <tr>   
                        <td>{{$ingreso2[0]->IngresoTotal}}</td>
                    </tr>    
                </tbody> 
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Total</th>  
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td>{{$reporte[0]->StockTotal+$ingreso2[0]->IngresoTotal}}</td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>MENOS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$salida[0]->SalidaTotal}}</td>
                    </tr>    
                </tbody>   
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cierre del Dia</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$reporte2[0]->Total}}</td>
                    </tr>   
                </tbody> 
            </table>
        </div>
    </div>
     <h3><a href="{{route('reportes.pdf')}}"><button class="btn btn-success">Imprimir Reporte</button></a></h3>
</div>
@endsection
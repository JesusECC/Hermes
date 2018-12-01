@extends('layouts.admin')
@section('content')
<section class="content-header">
  <h1 style="margin-top: 55px;">
    Panel de Administrador
    <small>Version 2.3.0</small>
    </h1>
    
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="callout callout-info">
            
      </div>
      <div class="box">
        <div class="box-header with-border" style="padding: 10px !important">
          <h3>
            <strong style="font-weight: 400">
               Nota de Pedido
            </strong>
          </h3>
        </div>

                <!-- /.box-header -->
        <div class="box-body" style="background-color: #4A4B49 !important;">
          <div class="container-fluid" style="background-color: white !important;">
            <div class="row">
              <div class="col-md-12">
                <img class="float-left" src="{{asset('img/logo-invoce.jpg')}}" alt="" style="width: 150px;">
               
                <small class="float-right mr-t-1"><span class="negrita">Fecha y Hora</span> {{$salidaV->fecha_horaS}}</small>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <center><strong>Cliente</strong></center> 
                <address>
                  <strong style="font-weight: 400 !important;">
                    Nombre: {{$salidaV->nombre_cliente}}
                  </strong>
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Documento: {{$salidaV->nroC}}
                  </strong>  
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Dirección: {{$salidaV->nombre_direccion}}
                  </strong> 
                  <br>
                  
                </address>
              </div>
              <div class="col-sm-4">
                <center><strong>Atendido por</strong></center>
                <address>
                  <strong style="font-weight: 400 !important;">Nombre: {{$salidaV->nombre_trabajador}}</strong>
                  <br>
                </address>
              </div>
              <div class="col-sm-4">
                
                <br>
                <b>Número de Proforma: <strong style="font-weight: 400 !important;">SV00-{{$salidaV->id}}</strong></b>
                <br>
                <b>Fecha y hora emitida: <strong style="font-weight: 400 !important;">{{$salidaV->fecha_horaS}}</strong> </b>
              </div>
            </div>
            <div class="row" style="padding-left:  30px !important;padding-right: 30px !important">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Codigo</th>
                      <th>Codigo Barras</th>
                      <th>Talla</th>
                      <th>Color</th>
                      <th>Cantidad</th>
                      <th>Precio de Venta</th>
                      <th>Descuento x c/u</th>
                      <th>Total</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($detalles as $det)
                        <tr>
                            <td>{{$det->productoPV}}</td>
                            <td>{{$det->codigoPV}}</td>
                            <td>{{$det->codigo_barr}}</td>
                            <td>{{$det->tallaVP}}</td>
                            <td>{{$det->colorVP}}</td>
                            <td>{{$det->cantidadPF}}</td>

                            <td>S/.{{$det->precio_ventaPF}}</td>
                            <td>{{$det->descuento}}%</td>
                            <td>S/.{{($det->precio_ventaPF*$det->cantidadPF)-(($det->cantidadPF*$det->precio_ventaPF)*($det->descuento/100))}}</td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              
              <div class="col-sm-3">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      
                     
                      <tr>
                        <th>Precio total</th>
                        <td>S/. {{round($salidaV->total_venta,2)}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection


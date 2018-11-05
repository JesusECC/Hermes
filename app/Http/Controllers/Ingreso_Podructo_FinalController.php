<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Ingreso_Podructo_Final;
use hermes\Detalle_ingresoPF;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;

class Ingreso_Podructo_FinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

public function create()
{

$trabajador=DB::table('Trabajador as c')
->join('Persona as p','p.id','=','c.idPersona')
->select('c.id as idTra','p.nro_documento','p.nombre','p.apellidos','p.fecha_nacimiento','p.sexo')
 ->where('c.estado_idEstado','=',1)
 ->get();

$almacen=DB::table('Almacen as a')
->select('a.id as idAl','a.nombre_almacen','a.codigo')
->get();


$tipoingreso=DB::table('Tipo_ingreso as t')
->select('t.id','t.nombre')
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario')
->where('p.estado_idEstado','=',1)
->get();
 
 return view("ingreso.create",["tipoingreso"=>$tipoingreso,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request)
    {
       try{

 DB::beginTransaction();

$ingreso=new Ingreso_Podructo_Final;
$ingreso->idTrabajador=$request->get('idTrabajador');
$ingreso->idAlmacen=$request->get('idAlmacen');
$ingreso->idTipo_ingreso=$request->get('idTipo_ingreso');
$ingreso->codigo_ingresoPF=$request->get('codigo_ingresoPF');
$ingreso->serie_comprobantePF=$request->get('serie_comprobantePF');
$ingreso->num_comprobantePF=$request->get('num_comprobantePF');
$ingreso->impuestoPF=18;
$ingreso->estado_idEstado=1;
$ingreso->save();

$idProducto=$request->get('idProduto_PF');
$cantidad=$request->get('cantidadPF');
$precio_compra=$request->get('precio_compraPF');
$precio_venta=$request->get('precio_ventaPF');

$cont = 0;

while ($cont<count($idProducto)) {
    $detalle = new Detalle_ingresoPF();
    $detalle->idIngreso_PF=$ingreso->idingreso;
    $detalle->idProduto_PF=$idProducto[$cont];
    $detalle->cantidadPF=$cantidad[$cont];
    $detalle->precio_compraPF=$precio_compra[$cont];
    $detalle->precio_ventaPF=$precio_venta[$cont];
    $detalle->save();
    $cont=$cont+1;

}

 DB::Commit();

}catch(\Exception $e)

{

DB::rollback();
}
    return Redirect::to('/ingreso');
}

 
public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

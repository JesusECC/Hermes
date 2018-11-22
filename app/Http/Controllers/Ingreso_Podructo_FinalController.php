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

$talla=DB::table('Tallas as t')
->select('t.id as idTa','t.nom_talla')
->get();

$color=DB::table('Color as t')
->select('t.id as idC','t.nombre_color')
->get();

$tipoingreso=DB::table('Tipo_ingreso as t')
->select('t.id as idIn','t.nombreTP')
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario','p.id as idPro')
->get();
 
 return view("ingreso.create",["color"=>$color,"tipoingreso"=>$tipoingreso,"talla"=>$talla,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request)
    {
     try{
        $idProducto;
        $produc;
        $cantidad;
        $precio_compra;
        $precio_venta;
        $trabajador;
        $almacen;
        $tipoingreso;
       
           
        foreach ($request->producto as $dato) {
            $idProducto=$dato['idProducto'];
            $produc=$dato['produc'];
            $cantidad=$dato['cantidad'];
            $precio_compra=$dato['precio_compra'];
            $precio_venta=$dato['precio_venta'];
            $trabajador=$dato['trabajador'];
            $almacen=$dato['almacen'];
            $tipoingreso=$dato['tipoingreso'];           
        }
        $idIngreso=DB::table('Ingreso_Podructo_Final')->insertGetId(
            ['idTrabajador'=>$trabajador,
            'idAlmacen'=>$almacen,           
            'idTipo_ingreso'=>$tipoingreso,
            'tipo_producto_ingreso'=>'productoF',//le asigne un tipo de producto el que ingresa 
            'codigo_ingresoPF'=>123,
            'impuestoPF'=>18,
            'estado_idEstado'=>1,            
            ]
        );

        foreach($request->fila as $fila){
            $detalle=new Detalle_ingresoPF;	
            $detalle->idIngreso_PF=$idIngreso;
            $detalle->idProduto_PF=$idProducto;
            $detalle->cantidadPF=$fila['cantidad'];
            $detalle->precio_compraPF=$fila['precio_compra'];
            $detalle->precio_ventaPF=$fila['precio_venta'];	
            $detalle->save();            
        }
            return ['dat' =>'/ingreso','veri'=>true];
        }catch(Exception $e){
            return ['dat' =>$e,'veri'=>false];
        }
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



    // 
    // CONSULTA PARA EL CODIGO DE BARRAS
    // 
    public function codBarra(Request $request)
    {
        //
        $codBarras=$request->get('codBarras');

        $consulta=DB::table('Productos as p')
        ->join('Tallas as t','t.id','=','p.Tallas_idTallas')
        ->join('Color as c','c.id','=','p.Color_idColor')
        ->join('Producto_Detalle as pd','pd.id','=','p.idDetalle_produto')
        ->where('p.CodigoB_Producto','=',$codBarras)
        ->get();
        if (count($consulta)>0) {
            $op=true;
            return ['consulta' =>$consulta,'veri'=>$op];
        }else{
            $op=false;
            return ['veri'=>$op];
        }
        
    }
    
}

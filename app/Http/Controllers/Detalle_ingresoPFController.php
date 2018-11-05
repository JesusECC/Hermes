<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;

class Detalle_ingresoPFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

 
}

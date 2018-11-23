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

class SalidaController extends Controller
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

$taller=DB::table('Taller as ta')
->select('ta.id as idTA','ta.nombre_taller','ta.codigoT')
->get();

$talla=DB::table('Tallas as t')
->select('t.id as idTa','t.nom_talla')
->get();

$color=DB::table('Color as t')
->select('t.id as idC','t.nombre_color')
->get();

$tiposalida=DB::table('Tipo_salida as ts')
->select('ts.id as idSa','ts.nombre as nombreS')
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario','p.id as idPro','pd.codigo_Prod')
->get();
 
 return view("salida.create",["tiposalida"=>$tiposalida,"taller"=>$taller,"color"=>$color,"talla"=>$talla,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request)
    {
     try{
        $idAlmacen;
        $codigob;
        $idTaller;
        $codigo;
        $producto;
        $talla;
        $color;
        $cantidad;
        $idTrabajador;
        

       
           
        foreach ($request->producto as $dato) {
            $idAlmacen=$dato['idAlmacen'];
            $codigob=$dato['codigob'];
            $idTaller=$dato['idTaller'];
            $codigo=$dato['codigo'];
            $producto=$dato['produco'];
            $talla=$dato['talla'];
            $color=$dato['color'];
            $cantidad=$dato['cantidad'];
            $idTrabajador=$dato['trabajador'];

           
        }
        $idSalida=DB::table('Salida')->insertGetId(
            ['idTrabajador'=>$idTrabajador,
            'idAlmacen'=>$idAlmacen,           
            'idTipo_salida'=>1,
            'estado_idEstado'=>1,
            
            ]
        );

        foreach($request->fila as $fila){
            $detalle=new Detalle_ingresoPF;	
            $detalle->idSalidaMP=$idSalida;
            $detalle->codigoSMP=$fila['cantidad'];
            $detalle->idTaller=$fila['cantidad'];
            $detalle->productoSMP=$fila['producto'];
            $detalle->colorSMP=$fila['color'];	
            $detalle->tallaSMP=$fila['talla'];
            $detalle->cantidadSMP=$fila['precio_venta']; 
            $detalle->codigo_bar=$fila['codigob'];
            $detalle->save();            
        }
            return ['dat' =>'/salida','veri'=>true];
        }catch(Exception $e){
            return ['dat' =>$e,'veri'=>false];
        }
}

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

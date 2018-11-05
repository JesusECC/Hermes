<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Ingreso_Materia_Prima;
use hermes\Detalle_ingresoMP;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;
class Ingreso_Materia_PrimaController extends Controller
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

$Tipo_Comprobante=DB::table('Tipo_Comprobante as tc')
->select('tc.id as idTC','tc.nombre_comprobante')
->get();

$tipoingreso=DB::table('Tipo_ingreso as t')
->select('t.id as idIn','t.nombreTP')
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario','p.id as idPro')
->get();
 
 return view("ingresoMP.create",["Tipo_Comprobante"=>$Tipo_Comprobante,"color"=>$color,"tipoingreso"=>$tipoingreso,"talla"=>$talla,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request)
    {

     try{
        $idProducto;
        $idTipo_Comprobante
    
        $cantidad;
        $trabajador;
        $almacen;
        $tipo_ingreso_producto;
        $num_comporbante;
        $serie_comprobante;
        $total_compra;
       
           
        foreach ($request->producto as $dato) {
            $idProducto=$dato['idProducto'];
            $idTipo_Comprobante=$dato['idTipo_Comprobante'];
            
            $cantidad=$dato['cantidad'];
            $trabajador=$dato['trabajador'];
            $almacen=$dato['almacen'];
            $tipo_ingreso_producto=$dato['tipo_ingreso_producto'];
            $num_comporbante=$dato['num_comporbante'];
            $serie_comprobante=$dato['serie_comprobante'];
            $total_compra=$dato['total_compra'];
           
        }
        $idIngreso=DB::table('Ingreso_Materia_Prima')->insertGetId(
            ['idTrabajador'=>$trabajador,
            'idTipo_Comprobante'=>$idTipo_Comprobante,
            'idAlmacen'=>$almacen,           
            'serie_comprobanteMP'=>$serie_comprobante,
            'num_comprobanteMP'=>$num_comporbante,
            'total_compra'=>$total_compra,
            'codigo_ingresoPF'=>123,
            'impuestoPF'=>18,
            'estado_idEstado'=>1,
            
            ]
        );

        foreach($request->fila as $fila){
            $detalle=new Detalle_ingresoMP;	
            $detalle->idIngreso_MP=$idIngreso;
            $detalle->idProducto_MP=$idProducto;
            $detalle->cantidadMP=$cantidad;
            $detalle->forma_Ing_producto=$fila['tipo_ingreso_producto'];
            $detalle->save();            
        }
            return ['dat' =>'/ingresoMP','veri'=>true];
        }catch(Exception $e){
            return ['dat' =>$e,'veri'=>false];
        }
}

    
}

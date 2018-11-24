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

$taller=DB::table('Taller as ta')
->select('ta.id as idTA','ta.nombre_taller','ta.codigoT')
->get();

$tipoingreso=DB::table('Tipo_ingreso as t')
->select('t.id as idIn','t.nombreTP')
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario','p.id as idPro')
->get();
 
 return view("ingreso.create",["taller"=>$taller,"color"=>$color,"tipoingreso"=>$tipoingreso,"talla"=>$talla,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request)
    {

        
     $filas=$request->filas;
    $opsalida=$request->opsalida;   
        $idIngreso=DB::table('Ingreso_Podructo_Final')->insertGetId(
            [
            'idTipo_ingreso'=>3,
            'idTrabajador'=>$opsalida[0]['idTrabajador'],          
            'estado_idEstado'=>1,
            'idAlmacen'=>$opsalida[0]['idAlmacen'],
            ]
        );
        foreach ($filas as $fila) {
            $Dsalida = new Detalle_ingresoPF();
            $Dsalida->idIngreso_PF=$idIngreso;
            $Dsalida->codigo_PF=$fila['codigo'];
            $Dsalida->nro_guia_PF=$fila['numeroG'];
            $Dsalida->idTaller_PF=$opsalida[0]['idTaller'];
            $Dsalida->productoPF=$fila['produco'];
            $Dsalida->colorPF=$fila['color'];
            $Dsalida->tallaPF=$fila['talla'];
            $Dsalida->cantidadPF=$fila['cantidad'];
            $Dsalida->descripcionPF=$fila['descripcion'];
            $Dsalida->codigo_bar=$fila['codigob'];
            $Dsalida->save();
        }
        return ['data' =>'salida','veri'=>true];
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

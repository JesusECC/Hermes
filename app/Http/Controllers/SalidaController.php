<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Ingreso_Podructo_Final;
use hermes\Detalle_ingresoPF;
use hermes\Detalle_Salida_MP;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;

class SalidaController extends Controller
{
   public function __construct(){

    }

    public function index(Request $request)
    {
    if($request)
    {

     $query=trim($request->get('searchText'));
     $salida=DB::table('Salida_MP as s')
     ->join('Almacen as a','s.idAlmacen','=','a.id')
     ->join('Trabajador as t','s.idTrabajador','=','t.id')
     ->join('Persona as p','p.id','=','t.idPersona')
     ->select('a.nombre_almacen','p.nombre','p.apellidos','s.id','s.fecha_SMP')
     ->where('s.id','LIKE','%'.$query.'%')
     ->where('s.idEstado','=',1)
     ->paginate(17);
       return view('salida.index',["salida"=>$salida,"searchText"=>$query]);
    }
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

public function store(Request $request){
    $filas=$request->filas;
    $opsalida=$request->opsalida;   
        $idSalida=DB::table('Salida_MP')->insertGetId(
            [
            'idTipo_salida'=>1,
            'idTrabajador'=>$opsalida[0]['idTrabajador'],          
            'idEstado'=>1,
            'idAlmacen'=>$opsalida[0]['pidAlmacen'],
            ]
        );
        foreach ($filas as $fila) {
            $Dsalida = new Detalle_Salida_MP();
            $Dsalida->idSalidaMP=$idSalida;
            $Dsalida->codigoSMP=$fila['codigo'];
            $Dsalida->idTaller=$opsalida[0]['idTaller'];
            $Dsalida->productoSMP=$fila['produco'];
            $Dsalida->colorSMP=$fila['color'];
            $Dsalida->tallaSMP=$fila['talla'];
            $Dsalida->cantidadSMP=$fila['cantidad'];
            $Dsalida->codigo_bar=$fila['codigob'];
            $Dsalida->save();
        }
        return ['data' =>'salida','veri'=>true];
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

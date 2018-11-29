<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Ingreso_Podructo_Final;
use hermes\Detalle_Salida;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use DB;

class SalidaVentaController extends Controller
{
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

$Cliente=DB::table('Cliente as c')
->join('Persona as p','p.id','=','c.Persona_idPersona')
->join('Direccion_persona as dp','dp.idPersona','=','p.id')
->join('Departamento as de','de.id','=','dp.Distrito_Provincia_Departamento_idDepartamento')
->join('Distrito as di','di.id','=','dp.Distrito_idDistrito')
->join('Provincia as pr','pr.id','=','dp.Distrito_Provincia_idProvincia')
->select('p.nombre','c.id','p.apellidos','p.nro_documento','dp.nombre_direccion','de.nombre_departamento','di.nombre_distrito','pr.nombre_provincia',db::raw('CONCAT(dp.nombre_direccion," ",de.nombre_departamento," ",pr.nombre_provincia," ",di.nombre_distrito) as Direccion'))
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario','p.id as idPro','pd.codigo_Prod')
->get();
 
 return view("salidaVenta.create",["Cliente"=>$Cliente,"taller"=>$taller,"color"=>$color,"talla"=>$talla,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request)
    {
        

        $filas=$request->filas;
        $opsalida=$request->opsalida;   
        $idSalida=DB::table('Salida')->insertGetId(
            [
            'idTipo_salida'=>2,
            'idTrabajador'=>$opsalida[0]['idTrabajador'],  
            'idCliente'=>$opsalida[0]['idCliente'],  
            'total_venta'=>$opsalida[0]['totalV'],       
            'idEstadoS'=>1,
            'idAlmacen'=>$opsalida[0]['pidAlmacen'],
            ]
        );
        foreach ($filas as $fila) {
            $Dsalida = new Detalle_Salida();
            $Dsalida->idSalida=$idSalida;
            $Dsalida->codigo_barr=$fila['codigob'];
            $Dsalida->codigoPV=$fila['codigo'];
            $Dsalida->productoPV=$fila['produco'];
            $Dsalida->tallaVP=$fila['talla'];
            $Dsalida->colorVP=$fila['color'];
            $Dsalida->cantidadPF=$fila['cantidad'];
            $Dsalida->precio_ventaPF=$fila['precio'];
            $Dsalida->descuento=$fila['descuento'];
            $Dsalida->impuesto=18;
            $Dsalida->save();
        }
        return ['data' =>'salidaVenta','veri'=>true];
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

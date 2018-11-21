<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Producto;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $producto=DB::table('Productos as p')
                ->join('Producto_Detalle as dp','dp.id','=','p.idDetalle_produto')
                 ->join('Color as col','col.id','=','p.Color_idColor')
                 ->join('estado as est','est.id','=','p.estado_idEstado')
                 ->join('Tallas as tas','tas.id','=','p.Tallas_idTallas') 

                ->join('Almacen as al','al.id','=','p.Almacen_idAlmacen') 
                ->join('Tipo_producto as tpro','tpro.id','=','dp.idTipoProducto')
                 
                 
                 
                 

                 ->select('p.CodigoB_Producto','dp.nombre_producto','dp.marca_producto','al.nombre_almacen','tas.nom_talla','col.nombre_color','p.stockP','p.precio_unitario','tpro.nombreTP')
                ->where('est.tipo_estado','=',1)
                 ->orderBy('p.id','desc')

                 ->paginate(10);

                  return view('producto.producto.index',['producto'=>$producto]);






        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
    $detalle_producto=db::table('Producto_Detalle')
    ->get();

    $talla=db::table('Tallas')
    ->get();

    $color=db::table('Color')
    ->get();

    $almacen=db::table('Almacen')
    ->get();

        return view('producto.producto.create',["almacen"=>$almacen,"detalle_producto"=>$detalle_producto,"talla"=>$talla,"color"=>$color]);
    }

    
    public function store(Request $request)
    {

$idDetalle_produto=$request->get('idDetalle_produto');
$CodigoB_Producto=$request->get('CodigoB_Producto');
$Tallas_idTallas=$request->get('Tallas_idTallas');
$Color_idColor=$request->get('Color_idColor');
$Almacen_idAlmacen=$request->get('Almacen_idAlmacen');
$stockP=$request->get('stockP');
$precio_unitario=$request->get('precio_unitario');


//dd($nombre_tarea,$precioT);  

$cont=0;

while ($cont<count($nombre_tarea)) {
 
    $tarea = new Tipotarea();
    $tarea->nombre_tarea=$nombre_tarea[$cont];
    $tarea->precioT=$precioT[$cont];
     $tarea->nombre_tarea=$nombre_tarea[$cont];
    $tarea->precioT=$precioT[$cont];
     $tarea->nombre_tarea=$nombre_tarea[$cont];
    $tarea->precioT=$precioT[$cont];
    $tarea->estado=1;
    $tarea->save();

    $cont=$cont+1;
}



    /*
       try{
        $idTipoProducto;
        $nombre;
        $marca;
        $categoria;
        $descuento;
        $codigo;
        $talla;
        $color;
        $almacen;
        $precioU;
        $stock;
        
  
        foreach ($request->datos as $dato) {
            $idTipoProducto=$dato['idTipoProducto'];
            $nombre=$dato['nombre'];
            $marca=$dato['marca'];
            $categoria=$dato['categoria'];
            $descuento=$dato['descuento'];
            $codigo=$dato['codigo'];
            $talla=$dato['talla'];
            $color=$dato['color'];
            $almacen=$dato['almacen'];
            $precioU=$dato['precioU'];
            $stock=$dato['stock'];
                    
        }
    
            $producto=new Producto;
            $producto->idDetalle_produto=$idDetalleProducto;
            $producto->CodigoB_Producto=$codigo;
            $producto->Tallas_idTallas=$talla;
            $producto->Color_idColor=$color;
            $producto->Almacen_idAlmacen=$almacen;
            $producto->stockP=$stock;
            $producto->precio_unitario=$precioU;
            $producto->estado_idEstado=1;
            $producto->save();


            return ['data' =>'/producto','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }

   }    
    }

   

    /**
    
    }*/
}

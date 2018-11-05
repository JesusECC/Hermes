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
        //
        return view('producto.producto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
    $tipoproducto=db::table('Tipo_producto')
    ->get();

    $talla=db::table('Tallas')
    ->get();

    $color=db::table('Color')
    ->get();

    $almacen=db::table('Almacen')
    ->get();

        return view('producto.producto.create',["almacen"=>$almacen,"tipoproducto"=>$tipoproducto,"talla"=>$talla,"color"=>$color]);
    }

    
    public function store(Request $request)
    {
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
     $idDetalleProducto=DB::table('Producto_Detalle')->insertGetId(
            [
            'idTipoProducto'=>$idTipoProducto,
            'nombre_producto'=>$nombre,           
            'marca_producto'=>$marca,
            'categoria'=>$categoria,
            'descuento'=>$descuento,
            ]
        );
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
    
    }
}

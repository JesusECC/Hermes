<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Almacen;
use hermes\Direccion_TTA;
use hermes\Telefono_Almacen;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Almacen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    $tienda=db::table('Tienda')
    ->where('estado_idEstado','=',1)
    ->get();
     
    $departamento=db::table('Departamento')
    ->get();

    $provincia=db::table('Provincia')
    ->get();

    $distrito=db::table('Distrito')
    ->get();

    $tipotelefono=db::table('Tipo_telefono')
    ->get();

    $operador=db::table('operador')
    ->get();

        return view('Almacen.create',["tienda"=>$tienda,"departamento"=>$departamento,"provincia"=>$provincia,"distrito"=>$distrito,"tipotelefono"=>$tipotelefono,"operador"=>$operador]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
try{
        $departamento;
        $distrito;
        $provincia;
        $direccion;
        $codigo;
        $idTienda;
        $nombrea;
        $numero;
        $tipo;
        $operador;
  
        foreach ($request->datos as $dato) {
            $departamento=$dato['departamento'];
            $distrito=$dato['distrito'];
            $provincia=$dato['provincia'];
            $direccion=$dato['direccion'];
            $codigo=$dato['codigo'];
            $idTienda=$dato['idTienda'];
            $nombrea=$dato['nombrea'];
            $numero=$dato['numero'];
            $tipo=$dato['tipo'];
            $operador=$dato['operador'];
                    
        }
     $idDireccion=DB::table('Direccion_TTA')->insertGetId(
            [
            'direccionAL'=>$direccion,
            'Distrito_idDistrito'=>$distrito,           
            'Distrito_Provincia_idProvincia'=>$provincia,
            'Distrito_Provincia_Departamento_idDepartamento'=>$departamento,
            'estado_idEstado'=>1,
            ]
        );

       $idAlmacen=DB::table('Almacen')->insertGetId(
            [
       'codigo'=>$codigo,
       'nombre_almacen'=>$nombrea,
       'idEstado'=>1,
       'idDireccion'=>$idDireccion,
       'Tienda_idTienda'=>$idTienda,
           ]
        );

       $tel=new Telefono_Almacen;
            $tel->Almacen_idAlmacen=$idAlmacen;
            $tel->numero=$numero;
            $tel->idTipo_telefono=$tipo;
            $tel->idoperador=$operador;
            $tel->save();


            return ['data' =>'/Almacen','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }



  


}

}

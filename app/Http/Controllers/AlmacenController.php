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

          $Almacen=DB::table('Almacen as a')
                 ->join('Telefono_Almacen as Ta','Ta.Almacen_idAlmacen','=','a.id')

                 ->join('Direccion_TTA as dire','dire.id','=','a.idDireccion')
                 ->join('estado as est','est.id','=','a.idEstado')
                ->join('Distrito as dis','dis.id','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.id','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.id','=','pro.Departamento_idDepartamento')
                 ->join('operador as op','op.id','=','Ta.idoperador')
                 ->join('Tienda as tie','tie.id','=','a.Tienda_idTienda')
                      ->join('Tipo_telefono as tp','tp.id','=','Ta.idTipo_telefono')

                 ->select('a.id','a.codigo','a.nombre_almacen','tie.nombre_tienda','Ta.numero','tp.nombre_tipo',DB::raw('CONCAT(depa.nombre_departamento,"/",pro.nombre_provincia,"/",dis.nombre_distrito) as direc'),'dire.direccionAL','op.nombre_operador')
                ->where('est.tipo_estado','=',1)
                 ->orderBy('a.id','desc')

                 ->paginate(10);

                  return view('Almacen.index',['Almacen'=>$Almacen]);

       
        
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
        
        $provincia;
        $distrito;
        $direccion;
        $codigo;
        $idTienda;
        $nombrea;
        $numero;
        $tipo;
        $operador;
  
        foreach ($request->datos as $dato) {
            $departamento=$dato['departamento'];
             $provincia=$dato['provincia'];
            $distrito=$dato['distrito'];
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
    public function edit($id)
    {

    }

     public function update(Request $request, $id)
    {
    }


      public function destroy($id)
    {
        

        $Almacen=Almacen::find($id);
        $Almacen->idEstado=2;
        $Almacen->update();
        return redirect('Almacen');
    }



       public function provincia(Request $request)
    {
        $idDepartamento=$request->get('departamento');
        $provincia=DB::table('Provincia')
        ->where('Departamento_idDepartamento','=',$idDepartamento)
        ->get();
        // dd($request);
        return ['provincia' =>$provincia,'veri'=>true];
    }
    public function distrito(Request $request)
    {
        $idProvincia=$request->get('Provincia');

        $distrito=DB::table('Distrito')
        ->where('Provincia_idProvincia','=',$idProvincia)
        ->get();
        // dd($request);
        return ['distrito' =>$distrito,'veri'=>true];

    //    id
    //    nombre_distrito
    //    Provincia_idProvincia
    //    Provincia_Departamento_idDepartamento
    }

}

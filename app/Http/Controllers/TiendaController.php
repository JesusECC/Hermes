<?php

namespace hermes\Http\Controllers;
use Illuminate\Http\Request;
use hermes\Http\Requests;
use hermes\Distrito;
use hermes\Provincia;
use hermes\Departamento;

use hermes\Tipo_telefono;
use hermes\operador;
use hermes\Telefono_Tienda;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use DB;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

               // $query=trim($request->get('searchText'));
               /* $tienda=DB::table('Tienda as t')
                 ->join('Telefono_Tienda as tele','tele.Tienda_idTienda','=','t.idTienda')
                 ->join('Direccion_TTA as dire','dire.idDireccion','=','t.idDireccionT')
                 ->join('Distrito as dis','dis.idDistrito','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.idProvincia','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.idDepartamento','=','pro.Departamento_idDepartamento')
                 //->join('Almacen as alma','alma.Tienda_idTienda','=','t.idTienda')
                 ->join('Tipo_tienda as tp','tp.idtipo_tienda','=','t.idtipo_tienda') 
                 ->join('estado as est','est.idEstado','=','t.estado_idEstado')
                 //->join('Telefono_Almacen as ta','ta.Almacen_idAlmacen','=','alma.idAlmacen')
                 ->join('operador as op','op.idoperador','=','tele.idoperador')
                 ->join('Tipo_telefono as tt','tt.idTipo_telefono','=','tele.idTipo_telefono')

                
                 ->select('t.codigo_tienda','t.nombre','tele.numero as numeroTele',DB::raw('CONCAT(depa.nombre_departamento,"/",pro.nombre_provincia,"/",dis.nombre_distrito) as direc'),'tp.nombre','tt.nombre_tipo','op.nombre_operador')
               // ->where('codigo_tienda','LIKE','%'.$query.'%')
                ->where('est.tipo_estado','=','activo')
                 ->orderBy('t.idTienda','desc')

                 ->paginate(7);*/

                  return view('Tienda.index');

    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $tienda=DB::table('Tienda')
             ->get();

                

                $distrito=DB::table('Distrito')
                 ->get();
                 
                $provincia=DB::table('Provincia')    
                ->get();

                $departamento=DB::table('Departamento')
                ->get();

                    $tipotelefono=DB::table('Tipo_telefono')
                    ->get();
                     $tipotienda=DB::table('Tipo_tienda')
                    ->get();
                    

                $operador=DB::table('operador')
                ->get();

                   $estado=DB::table('estado')
                   ->get();

 return view('Tienda.create',["tienda"=>$tienda,"distrito"=>$distrito,"tipotienda"=>$tipotienda,"departamento"=>$departamento,"provincia"=>$provincia,"distrito"=>$distrito,"tipotelefono"=>$tipotelefono,"operador"=>$operador]);

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
        $codigo;//
        $nombrea;//
        $tptienda;//
        $tipotele;//
        $opera;//
        $tele;//
        $departamento;
        $distrito;
        $provincia;
        $direcc;
       
  
        foreach ($request->datos as $dato) {

        $codigo=$dato['codigo'];
        $nombrea=$dato['nombrea'];
        $tptienda=$dato['tptienda'];
        $tipotele=$dato['tipotele'];
        $opera=$dato['opera'];
        $tele=$dato['tele'];
        $departamento=$dato['departamento'];
        $distrito=$dato['distrito'];
        $provincia=$dato['provincia'];
        $direcc=$dato['direcc'];
            
                    
        }
     $idDireccion=DB::table('Direccion_TTA')->insertGetId(
            [
            'direccionAL'=>$direcc,
            'Distrito_idDistrito'=>$distrito,           
            'Distrito_Provincia_idProvincia'=>$provincia,
            'Distrito_Provincia_Departamento_idDepartamento'=>$departamento,
            'estado_idEstado'=>1,
            ]
        );
/*
        $idTienda=new Tipo_tienda;
            $tptienda->nombre=$tptienda;
            $Tien->save();

*/
       $idTienda=DB::table('Tienda')->insertGetId(
        [
       'nombre'=>$nombrea,
       'codigo_tienda'=>$codigo,
       'estado_idEstado'=>1,
       'idDireccionT'=>$idDireccion,
       'idtipo_tienda'=>$tptienda,
           ]
        );

  $tie=new Telefono_Tienda;
            $tie->Tienda_idTienda=$idTienda;
            $tie->numero=$tele;
            $tie->idTipo_telefono=$tipotele;
            $tie->idoperador=$opera;
            $tie->save();
       



      

            return ['data' =>'/Tienda','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        return view("Tienda.edit",["tienda"=>tienda::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect::to('Tienda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

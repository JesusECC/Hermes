<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Http\Requests;
use hermes\Proveedor;
use hermes\Tipo_documento;
use hermes\operador;
use hermes\Departamento;
use hermes\Distrito;
use hermes\Provincia;
use hermes\estado;
use hermes\Telefono_proveedor;
use hermes\Direccion_persona;
use hermes\Tipo_telefono;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor=DB::table('Proveedor as pro')
         ->join( 'Direccion_persona as dire', 'dire.id','=','pro.idDireccionP')
         ->join( 'Tipo_documento as tpdoc' , 'tpdoc.id','=','pro.idTipo_documento')
         ->join( 'estado as est' , 'est.id','=','pro.estado_idEstado')
        ->join( 'Telefono_proveedor as telepro','telepro.idProveedor','=','pro.id')
        ->join( 'operador as ope','ope.id','=','telepro.idoperador')
       ->join( 'Tipo_telefono as tele','tele.id','=','telepro.idTipo_telefono')

        ->join( 'Distrito as dis','dis.id','=','dire.Distrito_idDistrito')
        ->join( 'Provincia as prov','prov.id','=','dis.Provincia_idProvincia')
        ->join( 'Departamento as depa','depa.id','=','prov.Departamento_idDepartamento')

    
             ->select('pro.id as proid','dire.id as direcid','telepro.id as teleproid','pro.razon_social','pro.nro_documentoP','tpdoc.id','tpdoc.nombre_TD','dire.nombre_direccion','tele.nombre_tipo',DB::raw('CONCAT(depa.nombre_departamento,"/",prov.nombre_provincia,"/",dis.nombre_distrito) as direc'),'ope.nombre_operador')

          ->where('est.tipo_estado','=',1)
         ->orderBy('pro.id','desc')

            ->paginate(5);
             


                    return view('Proveedor.index',['proveedor'=>$proveedor]);
    


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $proveedor=DB::table('Proveedor')
             ->get();
            $Direccion_persona=DB::table('Direccion_persona')    
            ->get();
          $distrito=DB::table('Distrito')
             ->get();
             
            $provincia=DB::table('Provincia')    
            ->get();

            $departamento=DB::table('Departamento')
            ->get();

            $tipotelefono=DB::table('Tipo_telefono')
            ->get();

            $tipodocumento=DB::table('Tipo_documento')
            ->get();
             $telefonoproveedor=DB::table('Telefono_proveedor')
            ->get();
            
            $operador=DB::table('operador')
            ->get();

               $estado=DB::table('estado')
               ->get();

             return view('Proveedor.create',["proveedor"=>$proveedor,"Direccion_persona"=>$Direccion_persona,"tipodocumento"=>$tipodocumento,"distrito"=>$distrito,"telefonoproveedor"=>$telefonoproveedor,"departamento"=>$departamento,"provincia"=>$provincia,"distrito"=>$distrito,"tipotelefono"=>$tipotelefono,"operador"=>$operador,"estado"=>$estado]);
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

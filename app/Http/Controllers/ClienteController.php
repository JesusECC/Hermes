<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use hermes\Departamento;
use hermes\Provincia;
use hermes\Cliente;
use hermes\operador;
use hermes\Distrito;
use hermes\Tipo_telefono;
use hermes\Telefono_Persona;
use hermes\Direccion_persona;
use hermes\Tipo_Cliente;
use hermes\estado;


use DB;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $cliente=DB::table('Cliente as c')
    ->join('Tipo_Cliente as tc','tc.id','=','c.idTipo_Persona')
    ->join('estado as est','est.id','=','c.estado_idEstado')
    ->join('Persona as per','per.id','=','c.Persona_idPersona') 
    ->join('Direccion_persona as dire','dire.idPersona','=','per.id')
    ->join('Tipo_documento as tpdoc','tpdoc.id','=','per.idTipo_documento')    
    ->join('Telefono_Persona as teleper','per.id','=','teleper.Persona_idPersona')
    ->join('Tipo_telefono as tptele','tptele.id','=','teleper.idTipo_telefono')
    ->join('operador as ope','ope.id','=','teleper.idTipo_telefono')
    ->select('c.id as cid','tc.nombreTC','tpdoc.nombre_TD','per.nro_documento','per.nro_documento',
    // DB::raw('CONCAT(depa.nombre_departamento,"/",pro.nombre_provincia,"/",dis.nombre_distrito) as direc'),
    'dire.nombre_direccion','per.nombre as nombreper','per.apellidos','per.fecha_nacimiento','per.sexo','teleper.numero',
    'tptele.nombre_tipo','ope.nombre_operador')    
    ->where('est.tipo_estado','=',1)
    ->orderBy('c.id','desc')
    ->get();
    // dd($cliente);
    return view('cliente.index',['cliente'=>$cliente]);
    }

   
    public function create()
    {
        //
        $cliente=DB::table('Cliente')
        ->where('estado_idEstado','=',1)
        ->get();
        $tipocliente=DB::table('Tipo_Cliente')
        ->get();
        $persona=DB::table('Persona')
        ->get();
        
        $tipodocumento=DB::table('Tipo_documento')
        ->get();

        $direccionpersonas=DB::table('Direccion_persona')
        ->get();

        $distrito=DB::table('Distrito')
        ->get();
        $provincia=DB::table('Provincia')
        ->get();
        $departamento=DB::table('Departamento')
        ->get();
       
        $tipotelefono=DB::table('Tipo_telefono')
        ->get();
        $operador=DB::table('operador')
        ->get();

        $estado=DB::table('estado')
        ->get();

        return view('cliente.create',["cliente"=>$cliente,"tipocliente"=>$tipocliente,"persona"=>$persona,"tipodocumento"=>$tipodocumento,"direccionpersoras"=>$direccionpersonas,"distrito"=>$distrito,"provincia"=>$provincia,"departamento"=>$departamento,"tipotelefono"=>$tipotelefono,"operador"=>$operador,'estado'=>$estado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $idpersona=DB::table('Persona')->insertGetId(
            [
                'idTipo_documento'=>$request->get('idTipo_documento'),
                'nro_documento'=>$request->get('nro_documento'),
                'nombre'=>$request->get('nombre'),
                'apellidos'=>$request->get('apellidos'),
                'fecha_nacimiento'=>$request->get('fecha_nacimiento'),
                'sexo'=>$request->get('sexo'),
            ]
        );
        // dd($idpersona,$request);
        $cliente=new Cliente;
        $cliente->idTipo_Persona=$request->get('tipocliente');
        $cliente->Persona_idPersona=$idpersona;
        $cliente->estado_idEstado=1;
        $cliente->save();

        // dd($cliente,$request,$request->get('tipocliente'),$idpersona);       

        $Direccion_persona=new Direccion_persona;
        $Direccion_persona->nombre_direccion=$request->get('nombre_direccion');
        $Direccion_persona->idPersona=$idpersona;
        $Direccion_persona->Distrito_idDistrito=$request->get('distrito');
        $Direccion_persona->Distrito_Provincia_idProvincia=$request->get('provincia');
        $Direccion_persona->Distrito_Provincia_Departamento_idDepartamento=$request->get('departamento');
        $Direccion_persona->estado_idEstado=1;
        $Direccion_persona->save();

        return redirect('cliente');
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

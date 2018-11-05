<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Cliente;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
                 ->join('Persona as per','per.id','=','c.Persona_idPersona')
                ->join('estado as est','est.id','=','c.estado_idEstado')
                

                 

                 ->select('per.nro_documento','per.nombre as nombrclient','per.apellidos','per.sexo','tc.nombre')
                ->where('est.tipo_estado','=',1)
                 ->orderBy('c.id','desc')

                 ->paginate(10);

                  return view('cliente.index',['cliente'=>$cliente]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cliente=DB::table('Cliente')->where('estado_idEstado','=',1)->get();
        $tipo_cliente=DB::table('Tipo_Cliente')->get();
        $persona=DB::table('Persona')->get();
        $tipo_documento=DB::table('Tipo_documento')->get();
        $distrito=DB::table('Distrito')->get();
        $provincia=DB::table('Provincia')->get();
        $departamento=DB::table('Departamento')->get();
        $tipo_telefono=DB::table('Tipo_telefono')->get();
        $operador=DB::table('operador')->get();

        return view('cliente.create',["cliente"=>$cliente,"tipo_cliente"=>$tipo_cliente,"persona"=>$persona,"tipo_documento"=>$tipo_documento,"distrito"=>$distrito,"provincia"=>$provincia,"departamento"=>$departamento,"tipo_telefono"=>$tipo_telefono,"operador"=>$operador]);
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
        $nombre;
        $apellidos;
        $fecnaci;
        $tipodocumento;
        $tipocliente;
        $nro_documento;
        $sexo;
        $departamento;
        $provincia;
        $nombre_direccion;
        $tipotelefono;
        $operador;
        $numero_telefonico;
  
        foreach ($request->datos as $dato) {
                $nombre=$dato['nombre'];
                $apellidos=$dato['apellidos'];
                $fecnaci=$dato['fecnaci'];
                $tipodocumento=$dato['tipodocumento'];
                $tipocliente=$dato['tipocliente'];
                $nro_documento=$dato['nro_documento'];
                $sexo=$dato['sexo'];
                $departamento=$dato['departamento'];
                $provincia=$dato['provincia'];
                $nombre_direccion=$dato['nombre_direccion'];
                $tipotelefono=$dato['tipotelefono'];
                $operador=$dato['operador'];
                $numero_telefonico=$dato['numero_telefonico'];
                            
        }
     $idDireccion=DB::table('Direccion_TTA')->insertGetId(
            [
            'direccionAL'=>$nombre_direccion,
            'Distrito_idDistrito'=>$distrito,           
            'Distrito_Provincia_idProvincia'=>$provincia,
            'Distrito_Provincia_Departamento_idDepartamento'=>$departamento,
            'estado_idEstado'=>1,
            ]
        );


        $idtipoCliente=DB::table('Tipo_Cliente')->insertGetId(
            [
            'nombre'=> $tipocliente,
           ]
        );
           $idtipodocumento=DB::table('Tipo_documento')->insertGetId(
            [
            'nombre_TD'=> $tipodocumento,
           ]
        );


         $idtipodocumento=DB::table('Tipo_documento')->insertGetId(
            [
            'nombre_TD'=> $tipodocumento,
           ]
        );

       $idcliente=DB::table('Cliente')->insertGetId(
            [
       'idTipo_Persona'=>$idtipoCliente,
       'Persona_idPersona'=>$nombrea,
       'estado_idEstado'=>1,
           ]
        );


       $tel=new Persona;
            $tel->Almacen_idAlmacen=$idAlmacen;
            $tel->numero=$numero;
            $tel->idTipo_telefono=$tipo;
            $tel->idoperador=$operador;
            $tel->save();


            return ['data' =>'/cliente','veri'=>true];
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

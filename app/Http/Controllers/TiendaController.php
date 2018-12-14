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
use hermes\Tienda;
use hermes\Direccion_TTA;
use hermes\Tipo_tienda;


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
        

     
                $tienda=DB::table('Tienda as t')
                 ->join('Telefono_Tienda as tele','tele.Tienda_idTienda','=','t.id')

                 ->join('Direccion_TTA as dire','dire.id','=','t.idDireccionT')
                 ->join('estado as est','est.id','=','t.estado_idEstado')
                 ->join('Tipo_tienda as tp','tp.id','=','t.idtipo_tienda') 

                 ->join('Distrito as dis','dis.id','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.id','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.id','=','pro.Departamento_idDepartamento')
                 
                 ->join('operador as op','op.id','=','tele.idoperador')
                 ->join('Tipo_telefono as tt','tt.id','=','tele.idTipo_telefono')

                 ->select('t.id as tid','t.codigo_tienda','t.nombre_tienda','tele.numero',DB::raw('CONCAT(depa.nombre_departamento,"/",pro.nombre_provincia,"/",dis.nombre_distrito) as direc'),'dire.direccionAL','tp.nombre','tt.nombre_tipo','op.nombre_operador')
                ->where('est.tipo_estado','=',1)
                 ->orderBy('t.id','desc')

                 ->paginate(10);

                  return view('Tienda.index',['tienda'=>$tienda]);

    

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

 return view('Tienda.create',["tienda"=>$tienda,"distrito"=>$distrito,"tipotienda"=>$tipotienda,"departamento"=>$departamento,"provincia"=>$provincia,"distrito"=>$distrito,"tipotelefono"=>$tipotelefono,"operador"=>$operador,"estado"=>$estado]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
            $idTienda=DB::table('Tienda')->insertGetId(
            [
                'nombre_tienda'=>$request->get('nombre_tienda'),
                'codigo_tienda'=>$request->get('codigo_tienda'),
                'estado_idEstado'=>1,
                'idDireccionT'=>$idDireccion,
                'idtipo_tienda'=>$request->get('idTipo_tienda'),
                
            ]
        );   
         $idDireccion=DB::table('Direccion_TTA')->insertGetId(
            [
            'direccionAL'=>$request->get('direccionAL'),
            'Distrito_idDistrito'=>$request->get('distrito'),          
            'Distrito_Provincia_idProvincia'=>$request->get('provincia'),
            'Distrito_Provincia_Departamento_idDepartamento'=>$request->get('departamento'),
            'estado_idEstado'=>1,
            ]
        );

        $teletienda=new Telefono_Tienda;
        $teletienda->Tienda_idTienda=$idTienda;
        $teletienda->numero=$request->get('numero');
        $teletienda->idTipo_telefono=$request->get('idTipo_telefono');;
        $teletienda->idoperador=$request->get('idTipooperador');
        $teletienda->save();
      /*  
        $Direccion_TTA=new Direccion_TTA;
        $Direccion_TTA->direccionAL=$request->get('direccionAL');
        $Direccion_TTA->Distrito_idDistrito=$request->get('distrito');
        $Direccion_TTA->Distrito_Provincia_idProvincia=$request->get('provincia');
        $Direccion_TTA->Distrito_Provincia_Departamento_idDepartamento=$request->get('departamento');
        $Direccion_TTA->estado_idEstado=1;
        $Direccion_TTA->save();
*/

        return redirect('Tienda');
        

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
       $tienda=DB::table('Tienda')
        ->where('id','=',$id)
              ->where('estado_idEstado','=',1)
             ->get();
        $distrito=DB::table('Distrito')
                 ->get();
                 
         $provincia=DB::table('Provincia')    
         ->get();

        $departamento=DB::table('Departamento')
        ->get();


/*        $direccion=DB::table('Direccion_TTA')
        ->get();*/
        $estado=DB::table('estado')
        ->get();


        $tipotelefono=DB::table('Tipo_telefono')
        ->get();
         $tipotienda=DB::table('Tipo_tienda')
        ->get();
       
        $operador=DB::table('operador')
        ->get();
                    

        $teletienda=DB::table('Tienda as t')
        ->join('Telefono_Tienda as tele','t.id','=','tele.Tienda_idTienda')
        ->join('Direccion_TTA as dire','t.idDireccionT','=','dire.id')
         ->join('Distrito as dis','dis.id','=','dire.Distrito_idDistrito')
        ->join('Provincia as pro','pro.id','=','dis.Provincia_idProvincia')
        ->join('Departamento as depa','depa.id','=','pro.Departamento_idDepartamento')
        ->join('estado as est','t.estado_idEstado','=','est.id')
        ->join('Tipo_tienda as tptienda','tptienda.id','=','t.idtipo_tienda')

        ->select('t.id as tid','t.nombre_tienda','t.codigo_tienda','t.estado_idEstado','dire.id as direid','dire.direccionAL','depa.nombre_departamento','pro.nombre_provincia','dis.nombre_distrito','tele.id as teleid','tptienda.id as idtptienda','dire.Distrito_idDistrito','tptienda.nombre','tele.numero','tele.idTipo_telefono','tele.idoperador')
        ->where('t.estado_idEstado','=',1)
        ->where('t.id','=',$id)
        ->get();
       // dd($id,$teletienda);
        // dd($persona,Persona::findOrFail($id));
        // dd(['trabajador'=>$trabajador]);
        return view('Tienda.edit',['tienda'=>Tienda::findOrFail($id),'teletienda'=>$teletienda,'distrito'=>$distrito,'provincia'=>$provincia,'departamento'=>$departamento,'estado'=>$estado,'tipotelefono'=>$tipotelefono,'tipotienda'=>$tipotienda,'operador'=>$operador]);

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
        //dd($request,$id);
        Tienda::where('id',$id)
        ->update([
            'nombre_tienda'=>$request->get('nombre_tienda'),
            'codigo_tienda'=>$request->get('codigo_tienda'),
            'estado_idEstado'=>$request->get('estado_idEstado'),
            'idDireccionT'=>$request->get('direid'),
            'idtipo_tienda'=>$request->get('idTipo_tienda'),
            
        ]);
        Telefono_Tienda::where('id',$request->get('teleid'))
        ->update([
            'numero'=>$request->get('numero'),
            'Tienda_idTienda'=>$request->get('tid'),
            'idTipo_telefono'=>$request->get('idTipo_telefono'),
            'idoperador'=>$request->get('idTipooperador'),
        ]);
        Direccion_TTA::where('id',$request->get('direid'))
        ->update([
            'direccionAL'=>$request->get('direccionAL'),
            'Distrito_idDistrito'=>$request->get('distrito'),
            'Distrito_Provincia_idProvincia'=>$request->get('provincia'),
            'Distrito_Provincia_Departamento_idDepartamento'=>$request->get('departamento'),
            'estado_idEstado'=>$request->get('estado_idEstado'),
        ]);
        

        return redirect('Tienda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $tienda=Tienda::find($id);
        $tienda->estado_idEstado=2;
        $tienda->update();
        return redirect('Tienda');
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

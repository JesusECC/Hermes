<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Http\Requests;
use hermes\Taller;
use hermes\Direccion_TTA;
use hermes\Distrito;
use hermes\Provincia;
use hermes\Departamento;
use hermes\Tipo_telefono;
use hermes\operador;
use hermes\Telefono_taller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;


class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

                $taller=DB::table('Taller as ta')       
                 ->join('Direccion_TTA as dire','dire.id','=','ta.idDireccion')

                 ->join('estado as est','est.id','=','ta.estado_idEstado')
                 ->join('Telefono_taller as teleta','teleta.idTaller','=','ta.id')

                 ->join('Distrito as dis','dis.id','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.id','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.id','=','pro.Departamento_idDepartamento')
                 
                 ->join('operador as op','op.id','=','teleta.idoperador')
                 ->join('Tipo_telefono as tt','tt.id','=','teleta.idTipo_telefono')

                 ->select('ta.id as taid','ta.codigoT','ta.nombre_taller','teleta.numero',DB::raw('CONCAT(depa.nombre_departamento,"/",pro.nombre_provincia,"/",dis.nombre_distrito) as direc'),'dire.direccionAL','tt.nombre_tipo','op.nombre_operador')
                ->where('est.tipo_estado','=',1)
                 ->orderBy('ta.id','desc')

                 ->paginate(5);
             

                

          return view('Taller.index',['taller'=>$taller]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $taller=DB::table('Taller')
         ->get();

         $teleTaller=DB::table('Telefono_taller')
         ->get();

         $tipotelefono=DB::table('Tipo_telefono')
         ->get();
          $distrito=DB::table('Distrito')
         ->get();
                 
           $provincia=DB::table('Provincia')    
          ->get();

          $departamento=DB::table('Departamento')
          ->get();

            $operador=DB::table('operador')
          ->get();

            $estado=DB::table('estado')
          ->get();
         
        return view('Taller.create',['taller'=>$taller,'teleTaller'=>$teleTaller,'tipotelefono'=>$tipotelefono,'distrito'=>$distrito,'provincia'=>$provincia,'departamento'=>$departamento,'operador'=>$operador,'estado'=>$estado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $idDireccion=DB::table('Direccion_TTA')->insertGetId(
            [
            'direccionAL'=>$request->get('direccionAL'),
            'Distrito_idDistrito'=>$request->get('distrito'),          
            'Distrito_Provincia_idProvincia'=>$request->get('provincia'),
            'Distrito_Provincia_Departamento_idDepartamento'=>$request->get('departamento'),
            'estado_idEstado'=>1,
            ]
        );

        $idTaller=DB::table('Taller')->insertGetId(
            [
                'codigoT'=>$request->get('codigoT'),
                'nombre_taller'=>$request->get('nombre_taller'),  
                'idDireccion'=>$idDireccion,
                'estado_idEstado'=>1,
                
            ]
        );

        

        $teletaller=new Telefono_taller;
        $teletaller->numero=$request->get('numero');
        $teletaller->idTaller=$idTaller;
        $teletaller->idTipo_telefono=$request->get('idTipo_telefono');
        $teletaller->idoperador=$request->get('idTipooperador');
        $teletaller->estado_idEstado=1;
        $teletaller->save();
     

        return redirect('Taller');
        

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
         $taller=DB::table('Taller')
        ->where('id','=',$id)
              ->where('estado_idEstado','=',1)
             ->get();
         $tipotelefono=DB::table('Tipo_telefono')
         ->get();
          $distrito=DB::table('Distrito')
         ->get();
                 
           $provincia=DB::table('Provincia')    
          ->get();

          $departamento=DB::table('Departamento')
          ->get();

            $operador=DB::table('operador')
          ->get();

            $estado=DB::table('estado')
          ->get();

             $teletaller=DB::table('Taller as ta')
                 ->join('Direccion_TTA as dire','dire.id','=','ta.idDireccion')
                 ->join('estado as est','est.id','=','ta.estado_idEstado')
                 ->join('Telefono_taller as teleta','teleta.idTaller','=','ta.id')
                 
                 ->join('operador as op','op.id','=','teleta.idoperador')
                 ->join('Tipo_telefono as tt','tt.id','=','teleta.idTipo_telefono')

                 ->select('ta.id as taid','ta.codigoT','ta.nombre_taller','teleta.numero','dire.id as dired','dire.direccionAL','dire.Distrito_idDistrito','dire.Distrito_Provincia_idProvincia','Distrito_Provincia_Departamento_idDepartamento','teleta.id as teletaid','teleta.idTipo_telefono','teleta.idoperador')
                ->where('ta.estado_idEstado','=',1)
                 ->where('ta.id','=',$id)
                 ->get();


                 return view('Taller.edit',['taller'=>Taller::findOrFail($id),'teletaller'=>$teletaller,'tipotelefono'=>$tipotelefono,'distrito'=>$distrito,'provincia'=>$provincia,'departamento'=>$departamento,'operador'=>$operador,'estado'=>$estado]);
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
      


             Taller::where('id',$id)
            ->update([
                'codigoT'=>$request->get('codigoT'),
                'nombre_taller'=>$request->get('nombre_taller'),
                'idDireccion'=>$request->get('dired'),
                'estado_idEstado'=>$request->get('estado_idEstado'),
                
            ]);
            Telefono_taller::where('id',$request->get('teletaid'))
            ->update([
                'numero'=>$request->get('numero'),
                'idTipo_telefono'=>$request->get('idTipo_telefono'),
                'idoperador'=>$request->get('idTipooperador'),
                'estado_idEstado'=>$request->get('estado_idEstado'),
                
            ]);

                Direccion_TTA::where('id',$request->get('dired'))
                 ->update([

                'direccionAL'=>$request->get('direccionAL'),
                'Distrito_idDistrito'=>$request->get('distrito'),
                 'Distrito_Provincia_idProvincia'=>$request->get('provincia'),
                'Distrito_Provincia_Departamento_idDepartamento'=>$request->get('departamento'),
                'estado_idEstado'=>$request->get('estado_idEstado'),
                
            ]);


            return redirect('Taller');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taller=Taller::find($id);
        $taller->estado_idEstado=2;
        $taller->update();
        return redirect('Taller');
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

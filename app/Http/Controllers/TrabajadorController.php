<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use hermes\Persona;
use hermes\Trabajador;
class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persona=DB::table('Persona as p')
        ->join('Trabajador as t','p.id','=','t.idPersona')
        ->join('estado as e','e.id','=','t.estado_idEstado')
        ->select('p.id','p.idTipo_documento','p.nro_documento','p.nombre','p.apellidos','p.fecha_nacimiento','p.sexo','p.fecha_sistema','t.id as idTrabajador','t.idPersona','t.sueldo','t.fecha_inicio','t.fecha_fin','t.estado_idEstado','e.descripcion')
        ->where('t.estado_idEstado','=',1)
        ->paginate(10);   
        return view('admin.trabajador.index',['persona'=>$persona]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $documento=DB::table('Tipo_documento')
        ->get();

        $estado=DB::table('estado')
        ->get();
        
        return view('admin.trabajador.create',['documento'=>$documento,'estado'=>$estado]);
    
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
        $trabajador=new Trabajador;
        $trabajador->sueldo=$request->get('sueldo');
        $trabajador->fecha_inicio=$request->get('fecha_inicio');
        $trabajador->fecha_fin=$request->get('fecha_fin');
        $trabajador->idPersona=$idpersona;
        $trabajador->estado_idEstado=$request->get('estado_idEstado');
        $trabajador->save();
        return redirect('trabajador');
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
        $documento=DB::table('Tipo_documento')
        ->get();

        $estado=DB::table('estado')
        ->get();

        $trabajador=DB::table('Persona as p')
        ->join('Trabajador as t','p.id','=','t.idPersona')
        ->select('p.id','p.idTipo_documento','p.nro_documento','p.nombre','p.apellidos','p.fecha_nacimiento','p.sexo','p.fecha_sistema','t.id as idTrabajador','t.idPersona','t.sueldo','t.fecha_inicio','t.fecha_fin','t.estado_idEstado')
        ->where('t.estado_idEstado','=',1)
        ->where('p.id','=',$id)
        ->get();
        // dd($persona,Persona::findOrFail($id));
        // dd(['trabajador'=>$trabajador]);
        return view('admin.trabajador.edit',['persona'=>Persona::findOrFail($id),'trabajador'=>$trabajador,'documento'=>$documento,'estado'=>$estado]);
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
        Persona::where('id',$id)
        ->update([
            'idTipo_documento'=>$request->get('idTipo_documento'),
            'nro_documento'=>$request->get('nro_documento'),
            'nombre'=>$request->get('nombre'),
            'apellidos'=>$request->get('apellidos'),
            'fecha_nacimiento'=>$request->get('fecha_nacimiento'),
            'sexo'=>$request->get('sexo'),
        ]);
        Trabajador::where('idPersona',$id)
        ->update([
            'sueldo'=>$request->get('sueldo'),
            'fecha_inicio'=>$request->get('fecha_inicio'),
            'fecha_fin'=>$request->get('fecha_fin'),
            'estado_idEstado'=>$request->get('estado_idEstado')
        ]);
        return redirect('trabajador');
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
        $trabajador=Trabajador::find($id);
        $trabajador->estado_idEstado=2;
        $trabajador->update();
        return redirect('trabajador');
    }
}

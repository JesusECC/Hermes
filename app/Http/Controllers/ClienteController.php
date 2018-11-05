<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('cliente.index');
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
        //
        try {


            
            
        } catch (Exception $e) {
            return ['data'=>$e,'veri'=>false]
            
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

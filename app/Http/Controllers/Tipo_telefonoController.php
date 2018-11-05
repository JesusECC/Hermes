<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_telefono;

class Tipo_telefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipotelefono=DB::table('Tipo_telefono')->get();
        // dd($rol);
        return view('tipotelefono.index',['tipotelefono'=>$tipotelefono]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipotelefono.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $tipotelefono=new Tipo_telefono;
        $tipotelefono->nombre_tipo=$request->get('tipo');
        $tipotelefono->glosa=$request->get('glosa');
        $tipotelefono->save();
        return redirect::to('tipotelefono');

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
         return view("tipotelefono.edit",['tipotelefono'=>Tipo_telefono::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->get('id'); 
        $tipotelefono=Tipo_telefono::Find($id);
        $tipotelefono->nombre_tipo=$request->get('tipo'); 
        $tipotelefono->glosa=$request->get('glosa'); 
        $tipotelefono->update();
        return redirect::to('tipotelefono');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tipotelefono=Tipo_telefono::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('tipotelefono');
    }
}

<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_ingreso;

class Tipo_ingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoingreso=DB::table('Tipo_ingreso')->get();
        // dd($rol);
        return view('tipoingreso.index',['tipoingreso'=>$tipoingreso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('tipoingreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoproducto=new Tipo_ingreso;
        $tipoproducto->nombre=$request->get('tipo');
        $tipoproducto->save();
        return redirect::to('tipoingreso');
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
                return view("tipoingreso.edit",['tipoingreso'=>Tipo_ingreso::find($id)]);
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
        $tipoproducto=Tipo_ingreso::Find($id);
        $tipoproducto->nombre=$request->get('tipo'); 
        $tipoproducto->update();
        return redirect::to('tipoingreso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $tipoingreso=Tipo_ingreso::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('tipoingreso');
    }
}

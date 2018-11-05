<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_salida_MP;

class Tipo_salida_MPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipo_salida_mp=DB::table('Tipo_salida_MP')->get();
        return view('producto.tipo_salida_mp.index',['tipo_salida_mp'=>$tipo_salida_mp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.tipo_salida_mp.create');
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
        $tipo_salida_mp=new Tipo_salida_MP;
        $tipo_salida_mp->nombreMP=$request->get('nombreMP');
        $tipo_salida_mp->save();
        return redirect::to('tipo_salida_mp');
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
        return view("producto.tipo_salida_mp.edit",['tipo_salida_mp'=>Tipo_salida_MP::find($id)]);
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
        //
        $id=$request->get('id');
        $tipo_salida_mp=Tipo_salida_MP::find($id);
        $tipo_salida_mp->nombreMP=$request->get('nombreMP');
        $tipo_salida_mp->update();
        return redirect::to('tipo_salida_mp');
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
        $tipo_salida_mp=Tipo_salida_MP::destroy($id);
        return Redirect::to('tipo_salida_mp');
    }
}

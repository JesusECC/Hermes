<?php

namespace hermes\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_Comprobante;


class Tipo_ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //
        $tipocomprobante=DB::table('Tipo_Comprobante')->get();
        // dd($rol);
        return view('tipocomprobante.index',['tipocomprobante'=>$tipocomprobante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipocomprobante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tipocomprobante=new Tipo_Comprobante;
        $tipocomprobante->nombre_comprobante=$request->get('tipo');
        $tipocomprobante->save();
        return redirect::to('tipocomprobante');
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
        return view("tipocomprobante.edit",['tipocomprobante'=>Tipo_Comprobante::find($id)]);
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
        $tipocomprobante=Tipo_comprobante::Find($id);
        $tipocomprobante->nombre_comprobante=$request->get('tipo'); 
        $tipocomprobante->update();
        return redirect::to('tipocomprobante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tipocomprobante=Tipo_comprobante::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('tipocomprobante');
    }
}

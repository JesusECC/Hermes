<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_producto;

class Tipo_productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tipoproducto=DB::table('Tipo_producto')->get();
        // dd($rol);
        return view('tipoproducto.index',['tipoproducto'=>$tipoproducto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('tipoproducto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoproducto=new Tipo_producto;
        $tipoproducto->nombre=$request->get('tipo');
        $tipoproducto->save();
        return redirect::to('tipoproducto');
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
        return view("tipoproducto.edit",['tipoproducto'=>Tipo_producto::find($id)]);
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
        $tipoproducto=Tipo_producto::Find($id);
        $tipoproducto->nombre=$request->get('tipo'); 
        $tipoproducto->update();
        return redirect::to('tipoproducto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tipoproducto=Tipo_producto::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('tipoproducto');
    }
}

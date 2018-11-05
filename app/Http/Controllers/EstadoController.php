<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use hermes\Estado;


class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estado=DB::table('estado')->get();
        return view('admin.estado.index',['estado'=>$estado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.estado.create');
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
        $estado=new Estado;
        $estado->tipo_estado=$request->get('tipo_estado');
        $estado->descripcion=$request->get('descripcion');
        $estado->save();
        return redirect('estado');
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
        // dd(Estado::findOrFail($id));
        return view("admin.estado.edit",['estado'=>Estado::findOrFail($id)]);
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
        $estado=Estado::Find($id);
        $estado->tipo_estado=$request->get('tipo_estado');
        $estado->descripcion=$request->get('descripcion');
        $estado->update();
        return redirect('estado');
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
        $rol=Estado::destroy($id);
        return redirect('estado');
    }
}

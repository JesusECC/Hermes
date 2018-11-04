<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rol=DB::table('Rol')->get();
        // dd($rol);
        return view('usuarios.rol.index',['rol'=>$rol]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.rol.create');
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
        // dd($request);
        $rol=new Rol;
        $rol->nombreRol=$request->get('rol');
        $rol->descripcion_rol=$request->get('descripcion');
        $rol->save();
        return redirect::to('rol');
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
        // $rol=Rol::where('idRol',$id)
        // ->get();
        // dd($rol);
        return view("usuarios.rol.edit",['rol'=>Rol::find($id)]);
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
        $rol=Rol::Find($id);
        $rol->nombreRol=$request->get('rol'); 
        $rol->descripcion_rol=$request->get('descripcion'); 
        $rol->update();
        return redirect::to('rol');
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
        $rol=Rol::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('rol');
    }
}

<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_tienda;

class Tipo_tiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tipotienda=DB::table('Tipo_tienda')->get();
        // dd($rol);
        return view('tipotienda.index',['tipotienda'=>$tipotienda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipotienda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tipotienda=new Tipo_tienda;
        $tipotienda->nombre=$request->get('tipotienda');
        $tipotienda->save();
        return redirect::to('tipotienda');
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
               return view("tipotienda.edit",['tipotienda'=>Tipo_tienda::find($id)]);

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
        $tipotienda=Tipo_tienda::Find($id);
        $tipotienda->nombre=$request->get('tipo'); 
        $tipotienda->update();
        return redirect::to('tipotienda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tipotienda=Tipo_tienda::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('tipotienda');
    }
}

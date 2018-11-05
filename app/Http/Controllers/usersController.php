<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use hermes\Persona;
use hermes\Trabajador;
use hermes\users;
use hermes\Rol;
use hermes\Users_Rol;
class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // nombre apellido usuario rol
        $user=DB::table('Users_Rol as ur')
        ->join('Rol as r','r.id','=','ur.idrol')
        ->join('users as u','u.id','=','ur.id')
        ->join('Trabajador as t','t.id','=','u.Trabajador_idTrabajador')
        ->join('Persona as p','p.id','=','t.idPersona')
        ->select('p.nombre','p.apellidos','u.usuario','r.nombreRol')
        ->where('t.estado_idEstado','=',1)
        ->get();
        // dd($user);

        return view('admin.users.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $trabajador=DB::table('Trabajador')->get();
        return view('admin.users.create',['trabajador'=>$trabajador]);
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

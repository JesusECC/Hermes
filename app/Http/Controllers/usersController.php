<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use DB;

use hermes\Persona;
use hermes\Trabajador;
use hermes\User;
use hermes\Rol;
use hermes\Users_Rol;
use hermes\Http\Requests\usersRequest;
class usersController extends Controller
{
    // function __construct() {
    // }
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
        ->select('u.id','p.nombre','p.apellidos','u.email','r.nombreRol')
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
        $trabajador=DB::table('Persona as p')
        ->join('Trabajador as t','p.id','=','t.idPersona')
        ->join('estado as e','e.id','=','t.estado_idEstado')
        ->select('p.nombre','p.apellidos','t.id as idTrabajador')
        ->where('t.estado_idEstado','=',1)
        ->get();

        $rol=DB::table('Rol')->get();
        // $trabajador=DB::table('Trabajador')->get();
        // dd($trabajador);
        return view('admin.users.create',['trabajador'=>$trabajador,'rol'=>$rol]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Request $request
    public function store(usersRequest $request)
    {
        //
        // dd($request);
        $iduser=DB::table('users')->insertGetId(
            [
                'Trabajador_idTrabajador'=>$request->get('Trabajador_idTrabajador'),
                'email'=>$request->get('usuario'),
                'password'=>Hash::make($request->get('password')),
                // 'remember_token'=>('remember_token', 100)->nullable(),
                // 'created_at'=>$request->get(''),
                // 'updated_at'=>$request->get(''),
            ]);
        $user_rol=new Users_Rol;
        $user_rol->id=$iduser;
        $user_rol->idRol=$request->get('idRol');
        
        $user_rol->save();
        return redirect('usuarios');
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
    public function roles($id){
        $user=DB::table('Users_Rol as ur')
        ->join('Rol as r','r.id','=','ur.idrol')
        ->join('users as u','u.id','=','ur.id')
        ->join('Trabajador as t','t.id','=','u.Trabajador_idTrabajador')
        ->join('Persona as p','p.id','=','t.idPersona')
        ->select('u.id','p.nombre','p.apellidos','u.email','r.nombreRol')
        ->where('t.estado_idEstado','=',1)
        ->where('u.id','=',$id)
        ->get();
        return $user;
    }
}

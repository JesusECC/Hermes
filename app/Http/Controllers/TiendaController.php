<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resquest $request)
    {
        if($request)
        {

                $query=trim($request->get('searchText'));
                $tienda=DB::table('Tienda as t')
                 ->join('Telefono_Tienda as tele','t.idTienda','=','tele.Tienda_idTienda')
                 ->join('Direccion as dire','dire.idDireccion','=','t.idDireccionT')
                 ->join('Distrito as dis','dis.idDistrito','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.idProvincia','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.idDepartamento','=','pro.Departamento_idDepartamento')
                 ->join('Almacen as alma','alma.Tienda_idTienda','=','t.idTienda')
                 ->join('Tipo_tienda as tp','tp.idtipo_tienda','=','t.idtipo_tienda')
                 ->join('estado as est','est.idEstado','=','t.idEstado')
                 
                 ->select('t.nombre','codigo_tienda','tele.numero','dis.nombre_distrito','pro.nombre_provincia','depa.nombre_departamento','alma.codigo','alma.nombre_almacen','tp.nombre')
                ->where('codigo_tienda','LIKE','%'.$query.'%')
                ->where('est.tipo_estado','=','activo')
                 ->orderBy('t.idTienda','desc')

                 ->paginate(7);
                 return view('',["tienda"=>$tienda,"searchText"=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $tienda=DB::table('Tienda as t')
                 ->join('Telefono_Tienda as tele','t.idTienda','=','tele.Tienda_idTienda')
                 ->join('Direccion as dire','dire.idDireccion','=','t.idDireccionT')
                 ->join('Distrito as dis','dis.idDistrito','=','dire.Distrito_idDistrito')
                 ->join('Almacen as alma','alma.Tienda_idTienda','=','t.idTienda')
                
                 ->select('t.nombre','codigo_tienda','tele.numero','alma.codigo','alma.nombre_almacen','tp.nombre')    
                ->get();

                $distritos=DB::table('Distrito as dist')
                ->select('dist.nombre_distrito')
                ->get();
                 
                $provincia=DB::table('Provincia as prov')
                ->select('prov.nombre_provincia')
                ->get();

                $departamento=DB::table('Departamento as depar')
                ->select('depar.nombre_departamento')
                ->get();

                   $estado=DB::table('estado as est')
                ->select('est.tipo_estado')
                ->get();
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

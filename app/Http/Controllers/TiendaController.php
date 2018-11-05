<?php

namespace hermes\Http\Controllers;
use Illuminate\Http\Request;
use hermes\Http\Requests;
use hermes\Tienda;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;


use DB;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

               // $query=trim($request->get('searchText'));
                $tienda=DB::table('Tienda as t')
                 ->join('Telefono_Tienda as tele','tele.Tienda_idTienda','=','t.idTienda')
                 ->join('Direccion_TTA as dire','dire.idDireccion','=','t.idDireccionT')
                 ->join('Distrito as dis','dis.idDistrito','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.idProvincia','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.idDepartamento','=','pro.Departamento_idDepartamento')
                 //->join('Almacen as alma','alma.Tienda_idTienda','=','t.idTienda')
                 ->join('Tipo_tienda as tp','tp.idtipo_tienda','=','t.idtipo_tienda') 
                 ->join('estado as est','est.idEstado','=','t.estado_idEstado')
                 //->join('Telefono_Almacen as ta','ta.Almacen_idAlmacen','=','alma.idAlmacen')
                 ->join('operador as op','op.idoperador','=','tele.idoperador')
                 ->join('Tipo_telefono as tt','tt.idTipo_telefono','=','tele.idTipo_telefono')

                
                 ->select('t.codigo_tienda','t.nombre','tele.numero as numeroTele',DB::raw('CONCAT(depa.nombre_departamento,"/",pro.nombre_provincia,"/",dis.nombre_distrito) as direc'),'tp.nombre','tt.nombre_tipo','op.nombre_operador')
               // ->where('codigo_tienda','LIKE','%'.$query.'%')
                ->where('est.tipo_estado','=','activo')
                 ->orderBy('t.idTienda','desc')

                 ->paginate(7);

                 return view('Tienda.index',["tienda"=>$tienda]);

    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $tienda=DB::table('Tienda as t')
                 ->join('Telefono_Tienda as tele','tele.Tienda_idTienda','=','t.idTienda')
                 ->join('Direccion_TTA as dire','dire.idDireccion','=','t.idDireccionT')
                 ->join('Distrito as dis','dis.idDistrito','=','dire.Distrito_idDistrito')
                 ->join('Provincia as pro','pro.idProvincia','=','dis.Provincia_idProvincia')
                 ->join('Departamento as depa','depa.idDepartamento','=','pro.Departamento_idDepartamento')
                 //->join('Almacen as alma','alma.Tienda_idTienda','=','t.idTienda')
                 ->join('Tipo_tienda as tp','tp.idtipo_tienda','=','t.idtipo_tienda') 
                 ->join('estado as est','est.idEstado','=','t.estado_idEstado')
                 //->join('Telefono_Almacen as ta','ta.Almacen_idAlmacen','=','alma.idAlmacen')
                 ->join('operador as op','op.idoperador','=','tele.idoperador')
                 ->join('Tipo_telefono as tt','tt.idTipo_telefono','=','tele.idTipo_telefono')

                 ->select('t.codigo_tienda','t.nombre','tele.numero','dire.direccionAL')    
                ->get();

                $distrito=DB::table('Distrito as dist')
                 ->get();
                 
                $provincia=DB::table('Provincia as prov')    
                ->get();

                $departamento=DB::table('Departamento as depar')
                ->get();

                    $tipotelefono=DB::table('Tipo_telefono as tipo')
                    ->get();

                $operador=DB::table('operador as oper')
                ->get();

                   $estado=DB::table('estado as est')
                   ->get();

 return view('Tienda.create',["tienda"=>$tienda,"distrito"=>$distrito,"departamento"=>$departamento,"provincia"=>$provincia,"distrito"=>$distrito,"tipotelefono"=>$tipotelefono,"operador"=>$operador]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        



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
       
        return view("Tienda.edit",["tienda"=>tienda::findOrFail($id)]);

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
        return redirect::to('Tienda');
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

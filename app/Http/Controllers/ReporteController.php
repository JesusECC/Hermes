<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Productos;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reporte=DB::table('Ingreso_Podructo_Final as ip')
        ->join('Detalle_ingresoPF as di','di.idIngreso_PF','=','ip.id')
        ->select(DB::raw('SUM(di.cantidadPF) as StockTotal'))
         ->whereDate('ip.fecha_horaPF', '<', Carbon::now()->format('Y-m-d'))
        ->get();

         $ingreso=DB::table('Ingreso_Podructo_Final as ip')
        ->join('Detalle_ingresoPF as di','di.idIngreso_PF','=','ip.id')
        ->select('di.nro_guia_PF','di.codigo_PF','di.codigo_bar','di.colorPF','di.tallaPF','di.cantidadPF','di.idTaller_PF')
         ->whereDate('ip.fecha_horaPF', '=', Carbon::now()->format('Y-m-d'))
         
        ->get();

         $ingreso2=DB::table('Ingreso_Podructo_Final as ip')
        ->join('Detalle_ingresoPF as di','di.idIngreso_PF','=','ip.id')
        ->select(DB::raw('SUM(di.cantidadPF) as IngresoTotal'))
        ->whereDate('ip.fecha_horaPF', '=', Carbon::now()->format('Y-m-d'))
        ->get();

        

        $reporte2=DB::table('Productos as p')
        ->select(DB::raw('SUM(p.stockP) as Total'))
        ->get();

        $salida=DB::table('Salida as s')
        ->join('Detalle_Salida as ds','ds.idSalida','=','s.id')
        ->select(DB::raw('SUM(ds.cantidadPF) as SalidaTotal'))
        ->whereDay('fecha_horaS', '=', date('d'))
         ->get();

         $salida2=DB::table('Detalle_Salida as ds')
        ->join('Salida as s','s.id','=','ds.idSalida')
        ->join('Cliente as c','c.id','=','s.idCliente')
        ->join('Persona as p','p.id','=','c.Persona_idPersona')
        ->join('Direccion_persona as dp','dp.idPersona','=','p.id')
        ->join('Distrito as dis','dis.id','=','dp.Distrito_idDistrito')
        ->join('Provincia as pro','pro.id','=','dis.Provincia_idProvincia')
        ->join('Departamento as depa','depa.id','=','pro.Departamento_idDepartamento')
        ->select('ds.codigo_barr','ds.codigoPV','ds.productoPV','ds.tallaVP','ds.colorVP','ds.cantidadPF','ds.precio_ventaPF','s.fecha_horaS','p.nombre','p.apellidos','dp.nombre_direccion','depa.nombre_departamento','dis.nombre_distrito','pro.nombre_provincia')
        ->whereDate('s.fecha_horaS', '=', Carbon::now()->format('Y-m-d'))
         ->get();
        
       
      

        return view('reportes.index',['ingreso2'=>$ingreso2,'reporte2'=>$reporte2,'reporte'=>$reporte,'ingreso'=>$ingreso,'salida'=>$salida,'salida2'=>$salida2]);

        
    }

}

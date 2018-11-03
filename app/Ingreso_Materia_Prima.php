<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Ingreso_Materia_Prima extends Model
{
    //
    protected $table='Ingreso_Materia_Prima';
    protected $primarykey='idIngreso';
    public $timestamps=false;
    
    protected $filleable=[
        'idAlmacen_MP',
        'Proveedor_idProveedor',
        'idTipo_Comprobante',
        'codigo_ingresoMP',
        'serie_ingresoMP',
        'num_ingresoMP',
        'fecha_horaMP',
        'impuestoMP',
        'estado_idEstado',
    ];
    protected $guarded=[

    ];
}

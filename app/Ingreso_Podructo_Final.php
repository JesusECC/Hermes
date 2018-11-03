<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Ingreso_Podructo_Final extends Model
{
    //
    protected $table='Ingreso_Podructo_Final';
    protected $primarykey='idIngreso';
    public $timestamps=false;
    
    protected $filleable=[
        'idTrabajador',
        'idAlmacen',
        'idTipo_ingreso',
        'codigo_ingresoPF',
        'serie_comprobantePF',
        'num_comprobantePF',
        'fecha_horaPF',
        'impuestoPF',
        'estado_idEstado',
    ];
    protected $guarded=[

    ];
}

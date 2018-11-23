<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Salida_MP extends Model
{
    //
    protected $table='Salida_MP';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'idTipo_salida',	
        'idTrabajador',	
        'fecha_SMP'	,
        'idEstado',	
        'idAlmacen',

    ];
    protected $guarded=[

    ];
}

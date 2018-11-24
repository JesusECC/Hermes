<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Detalle_Salida_MP extends Model
{
    //
    protected $table='Detalle_Salida_MP';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'idSalidaMP',
        'codigoSMP',	
        'idTaller',	
        'productoSMP',	
        'colorSMP',	
        'tallaSMP',	
        'cantidadSMP',	
        'codigo_bar',

    ];
    protected $guarded=[

    ];
}

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Salida_MP extends Model
{
    //
    protected $table='Salida_MP';
    protected $primarykey='idSalida';
    public $timestamps=false;
    
    protected $filleable=[
        'idTipo_salida',
        'idTrabajador',
        'idTipo_moneda',
        'serie_NP',
        'numero_NP',
        'fecha_hora',
        'subtotal',
        'precio_total',
    ];
    protected $guarded=[

    ];
}

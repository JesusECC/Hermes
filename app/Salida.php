<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    //.
    protected $table='Salida';
    protected $primarykey='idSalida';
    public $timestamps=false;
    
    protected $filleable=[
        'idTipo_salida',
        'idTrabajador',
        'idCliente',
        'Taller_idTaller',
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

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Detalle_Salida extends Model
{
    //
    protected $table='Detalle_Salida';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'idSalida',
        'codigo_barr',
        'codigoPV',
        'productoPV',
        'tallaVP',
        'colorVP',
        'cantidadPF',
        'precio_ventaPF',
        'descuento',
        'impuesto',

    ];
    protected $guarded=[

    ];
}

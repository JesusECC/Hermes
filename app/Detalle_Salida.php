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
        'idProduto_PF',
        'idSalida',
        'cantidadPF',
        'precio_ventaPF',
        'impuesto',

    ];
    protected $guarded=[

    ];
}

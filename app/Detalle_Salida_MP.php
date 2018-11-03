<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Detalle_Salida_MP extends Model
{
    //
    protected $table='Detalle_Salida_MP';
    protected $primarykey='idDetalle_Salida';
    public $timestamps=false;
    
    protected $filleable=[
        'idProduto_MP',
        'idSalida',
        'cantidadPF',
        'precio_ventaPF',
        'impuesto',
        'descuentoDS',
    ];
    protected $guarded=[

    ];
}

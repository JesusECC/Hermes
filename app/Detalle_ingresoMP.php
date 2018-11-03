<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Detalle_ingresoMP extends Model
{
    //
    protected $table='Detalle_ingresoMP';
    protected $primarykey='idDetalle_ingresoMP';
    public $timestamps=false;
    
    protected $filleable=[
        'idProducto_MP',
        'idIngreso_MP',
        'cantidadMP',
        'forma_Ing_producto',
        'precio_compraMP',

    ];
    protected $guarded=[

    ];
}

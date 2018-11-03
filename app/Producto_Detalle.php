<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Producto_Detalle extends Model
{
    //
    protected $table='Producto_Detalle';
    protected $primarykey='idDetalle_producto';
    public $timestamps=false;
    
    protected $filleable=[
        'idTipoProducto',
        'nombre_producto',
        'marca_producto',
        'categoria',
        'descuento',
        'stock',

    ];
    protected $guarded=[

    ];
}

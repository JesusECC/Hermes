<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Producto_MP extends Model
{
    //
    protected $table='Producto_MP';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'codigo_producto',
        'nombre_productoMP',
        'precio_productoMP',
        'cantidad',
        'estado_idEstado',
        'Proveedor_idProveedor',

    ];
    protected $guarded=[

    ];
}

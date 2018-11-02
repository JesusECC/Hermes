<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table='Productos';
    protected $primarykey='idProductoUnitario';
    public $timestamps=false;
    
    protected $filleable=[
        'idDetalle_produto',
        'CodigoB_Producto',
        'Tallas_idTallas',
        'Color_idColor',
        'Almacen_idAlmacen',
        'precio_unitario',
        'Stock',
        'estado_idEstado',

    ];
    protected $guarded=[

    ];

}

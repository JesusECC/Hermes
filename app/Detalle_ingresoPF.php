<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Detalle_ingresoPF extends Model
{
    //
    protected $table='Detalle_ingresoPF';
    protected $primarykey='idDetalle_ingresoPF';
    public $timestamps=false;
    
    protected $filleable=[
            'idIngreso_PF',
            'idProduto_PF',
            'cantidadPF',
            'precio_compraPF',
            'precio_ventaPF',

    ];
    protected $guarded=[

    ];
}

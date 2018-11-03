<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //
    protected $table='Almacen';
    protected $primarykey='idAlmacen';
    public $timestamps=false;
    
    protected $filleable=[
            'codigo',
            'nombre_almacen',
            'idEstado',
            'idDireccion',
            'Tienda_idTienda',


    ];
    protected $guarded=[

    ];
}

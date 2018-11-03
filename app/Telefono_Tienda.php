<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Telefono_Tienda extends Model
{
    //
    protected $table='Telefono_Tienda';
    protected $primarykey='idTelefono';
    public $timestamps=false;
    
    protected $filleable=[
        'Almacen_idAlmacen',
        'Tienda_idTienda',
        'numero',
        'idTipo_telefono',
        'idoperador',
    ];
    protected $guarded=[

    ];
}

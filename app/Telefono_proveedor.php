<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Telefono_proveedor extends Model
{
    //
    protected $table='Telefono_proveedor';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'numero',
        'idProveedor',
        'idTipo_telefono',
        'idoperador',
        'estado_idEstado',
    ];
    protected $guarded=[

    ];
}

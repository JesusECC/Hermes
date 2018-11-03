<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Telefono_Almacen extends Model
{
    //
    protected $table='Telefono_Almacen';
    protected $primarykey='idTaller';
    public $timestamps=false;
    
    protected $filleable=[
        'Almacen_idAlmacen',
        'numero',
        'idTipo_telefono',
        'idoperador',
    ];
    protected $guarded=[

    ];
}

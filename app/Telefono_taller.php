<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Telefono_taller extends Model
{
    //
    protected $table='Telefono_taller';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'numero',
        'idTaller',
        'idTipo_telefono',
        'idoperador',
        'estado_idEstado',

    ];
    protected $guarded=[

    ];
}

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table='Rol';
    protected $primarykey='idRol';
    public $timestamps=false;
    
    protected $filleable=[
        'nombreRol',
        'descripcion_rol',

    ];
    protected $guarded=[

    ];
}

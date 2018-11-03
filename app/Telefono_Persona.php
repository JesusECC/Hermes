<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Telefono_Persona extends Model
{
    //
    protected $table='Telefono_Persona';
    protected $primarykey='idTelefono';
    public $timestamps=false;
    
    protected $filleable=[
        'numero',
        'Persona_idPersona',
        'idTipo_telefono',
        'idoperador',
        'estado_idEstado',

    ];
    protected $guarded=[

    ];
}

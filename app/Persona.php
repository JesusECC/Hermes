<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table='Persona';
    protected $primarykey='idPersona';
    public $timestamps=false;
    
    protected $filleable=[
        'idTipo_documento',
        'nro_documento',
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'sexo',
        'fecha_sistema',

    ];
    protected $guarded=[

    ];
}

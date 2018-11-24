<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Direccion_persona extends Model
{
    //
    protected $table='Direccion_persona';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_direccion',
        'idPersona',
        'Distrito_idDistrito',
        'Distrito_Provincia_idProvincia',
        'Distrito_Provincia_Departamento_idDepartamento',
        'estado_idEstado',

    ];
    protected $guarded=[

    ];
}

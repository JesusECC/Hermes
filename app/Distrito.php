<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    //
    protected $table='Distrito';
    protected $primarykey='idDistrito';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_distrito',
        'Provincia_idProvincia',
        'Provincia_Departamento_idDepartamento',
    ];
    protected $guarded=[

    ];
}

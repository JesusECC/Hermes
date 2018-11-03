<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Direccion_TTA extends Model
{
    //
    protected $table='Direccion_TTA';
    protected $primarykey='idDireccion';
    public $timestamps=false;
    
    protected $filleable=[
        'Distrito_idDistrito',
        'Distrito_Provincia_idProvincia',
        'Distrito_Provincia_Departamento_idDepartamento',
        'estado_idEstado',
        'direccionAL',

    ];
    protected $guarded=[

    ];
}

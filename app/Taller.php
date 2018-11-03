<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    //
    protected $table='Taller';
    protected $primarykey='idTaller';
    public $timestamps=false;
    
    protected $filleable=[
        'idTipo_documento',
        'razon_social',
        'nro_documentoP',
        'idDireccion',
        'estado_idEstado',
    ];
    protected $guarded=[

    ];
}

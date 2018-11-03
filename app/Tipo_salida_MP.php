<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_salida_MP extends Model
{
    //
    protected $table='Tipo_salida_MP';
    protected $primarykey='idTipo_salidaMP';
    public $timestamps=false;
    
    protected $filleable=[
        'nombreMP',
    ];
    protected $guarded=[

    ];
}

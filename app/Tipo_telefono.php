<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_telefono extends Model
{
    //
    protected $table='Tipo_telefono';
    protected $primarykey='idTipo_telefono';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_tipo',
        'glosa',
    ];
    protected $guarded=[

    ];
}

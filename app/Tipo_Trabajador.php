<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_Trabajador extends Model
{
    //
    protected $table='Tipo_Trabajador';
    protected $primarykey='idTipo_Trabajador';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

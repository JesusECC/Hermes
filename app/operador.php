<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class operador extends Model
{
    //
    protected $table='operador';
    protected $primarykey='idoperador';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_operador',
        'glosa',

    ];
    protected $guarded=[

    ];
}

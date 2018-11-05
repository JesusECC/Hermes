<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_salida_MP extends Model
{
    //
    protected $table='Tipo_salida_MP';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombreMP',
    ];
    protected $guarded=[

    ];
}

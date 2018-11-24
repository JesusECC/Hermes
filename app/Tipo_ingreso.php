<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_ingreso extends Model
{
    //
    protected $table='Tipo_ingreso';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

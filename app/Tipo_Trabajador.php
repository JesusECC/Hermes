<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_Trabajador extends Model
{
    //
    protected $table='Tipo_Trabajador';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

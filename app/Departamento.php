<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table='Departamento';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
            'nombre_departamento',
    ];
    protected $guarded=[

    ];
}

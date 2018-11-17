<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_tienda extends Model
{
    //
    protected $table='Tipo_tienda';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_tienda extends Model
{
    //
    protected $table='Tipo_tienda';
    protected $primarykey='idtipo_tienda';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

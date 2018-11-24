<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_Comprobante extends Model
{
    //
    protected $table='Tipo_Comprobante';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_comprobante',
    ];
    protected $guarded=[

    ];
}

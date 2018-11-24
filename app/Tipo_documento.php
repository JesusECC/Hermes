<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    //
    protected $table='Tipo_documento';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_TD',
    ];
    protected $guarded=[

    ];
}

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cliente extends Model
{
    //
    protected $table='Tipo_Cliente';
    protected $primarykey='idTipo_Cliente';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

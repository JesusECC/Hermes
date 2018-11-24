<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_producto extends Model
{
    //
    protected $table='Tipo_producto';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}

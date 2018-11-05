<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tallas extends Model
{
    //
    protected $table='Tallas';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nom_talla',
    ];
    protected $guarded=[

    ];
}

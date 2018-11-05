<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table='Color';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
            'nombre_color',
    ];
    protected $guarded=[

    ];
}

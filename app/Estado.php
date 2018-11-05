<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table='estado';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'tipo_estado',
        'descripcion',
    ];
    protected $guarded=[

    ];
}

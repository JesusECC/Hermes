<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table='estado';
    protected $primarykey='idEstado';
    public $timestamps=false;
    
    protected $filleable=[
        'tipo_estado',
    ];
    protected $guarded=[

    ];
}

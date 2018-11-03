<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table='Cliente';
    protected $primarykey='idCliente';
    public $timestamps=false;
    
    protected $filleable=[
            'idTipo_Persona',
            'Persona_idPersona',
            'estado_idEstado',
    ];
    protected $guarded=[

    ];
}

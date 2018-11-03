<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table='users';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'Trabajador_idTrabajador',
        'usuario',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    protected $guarded=[

    ];
}

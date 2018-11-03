<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Users_Rol extends Model
{
    //
    protected $table='Users_Rol';
    protected $primarykey='idUser';
    public $timestamps=false;
    
    protected $filleable=[
        'idRol',
    ];
    protected $guarded=[

    ];
}

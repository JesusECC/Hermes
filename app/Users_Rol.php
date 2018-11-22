<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Users_Rol extends Model
{
    //
    protected $table='Users_Rol';
    // protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'id','idRol',
    ];
    protected $guarded=[

    ];
}

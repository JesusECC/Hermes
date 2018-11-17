<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table='Tienda';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $filleable=[
		'nombre',
		'codigo_tienda',
		'estado_idEstado',
		'idDireccionT',
		'idtipo_tienda',	

    ];
    protected $guarded =[
     
   ];

}

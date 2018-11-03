<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table='Trabajador';
    protected $primaryKey='idTrabajador';
    public $timestamps=false;

    protected $filleable=[
		'idTipo_Persona',
		'idPersona',
		'sueldo',
		'fecha_inicio',
		'fecha_fin',	
		'estado_idEstado'	

    ];
    protected $guarded =[
     
   ];
}

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Detalle_ingresoPF extends Model
{
    //
    protected $table='Detalle_ingresoPF';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
            'idIngreso_PF',
            'codigo_PF',
            'idTaller_PF',
            'nro_guia_PF',
            'cantidadPF',
            'colorPF',
            'tallaPF',
            'codigo_bar',
            'descripcionPF',
            'productoPF',
     ];       
    protected $guarded=[

    ];
}

<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table='Proveedor';
    protected $primarykey='idProveedor';
    public $timestamps=false;

    protected $filleable=[
        'razon_social',
        'nro_documentoP',
        'idTipo_documento',
        'estado_idEstado',
        'idDireccionP',
    ];

    protected $guarded=[

    ];
}

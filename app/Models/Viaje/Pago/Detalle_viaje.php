<?php

namespace App\Models\Viaje\Pago;

use Illuminate\Database\Eloquent\Model;

class Detalle_viaje extends Model
{
    protected $table= 'detalle_viaje';
    public $timestamps = false;
    protected $fillable = [
        'iddetalle_viaje','descripcion','pago_id_transaccion'
    ];

    protected $primaryKey = 'iddtalle_viaje';
}

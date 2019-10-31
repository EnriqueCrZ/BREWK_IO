<?php

namespace App\Models\Viaje\Pago;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table= 'pago';
    public $timestamps = false;
    protected $fillable = [
        'id_transaccion','fecha','account_dpi','itinerario_id_itinerario'
    ];

    protected $primaryKey = 'id_transaccion';
}

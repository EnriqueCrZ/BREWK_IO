<?php

namespace App\Models\Viaje;

use Illuminate\Database\Eloquent\Model;

class Transbordo extends Model
{
    protected $table= 'transbordo';
    public $timestamps = false;
    protected $fillable = [
        'id_transbordo','ruta_id_ruta','itinerario_id_itinerario','bus_placa'
    ];

    protected $primaryKey = 'id_transbordo';
}

<?php

namespace App\Models\Viaje;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    protected $table= 'itinerario';
    public $timestamps = false;
    protected $fillable = [
        'id_itinerario','bus_placa','hora_salida','ruta_id_ruta'
    ];

    protected $primaryKey = 'id_itinerario';
}

<?php

namespace App\Models\Viaje\Ruta;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table= 'ruta';
    public $timestamps = false;
    protected $fillable = [
        'id_ruta','costo','origen_id_origen','destino_id_destino'
    ];

    protected $primaryKey = 'id_ruta';
}

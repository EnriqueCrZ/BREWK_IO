<?php

namespace App\Models\Viaje\Ruta;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table= 'destino';
    public $timestamps = false;
    protected $fillable = [
        'id_destino','lugar_id_lugar'
    ];

    protected $primaryKey = 'id_destino';
}

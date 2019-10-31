<?php

namespace App\Models\Viaje\Ruta;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table= 'lugar';
    public $timestamps = false;
    protected $fillable = [
        'id_lugar','descripcion'
    ];

    protected $primaryKey = 'id_lugar';
}

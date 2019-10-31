<?php

namespace App\Models\Viaje\Ruta;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
    protected $table= 'origen';
    public $timestamps = false;
    protected $fillable = [
        'id_origen','lugar_id_lugar'
    ];

    protected $primaryKey = 'id_origen';
}

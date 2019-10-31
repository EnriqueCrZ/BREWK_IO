<?php

namespace App\Models\Viaje\Bus;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table= 'chofer';
    public $timestamps = false;
    protected $fillable = [
        'dpi','nombre_completo','celular'
    ];

    protected $primaryKey = 'dpi';
}

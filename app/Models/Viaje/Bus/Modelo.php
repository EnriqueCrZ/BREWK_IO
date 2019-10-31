<?php

namespace App\Models\Viaje\Bus;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table= 'modelo';
    public $timestamps = false;
    protected $fillable = [
        'id_modelo','modelo'
    ];

    protected $primaryKey = 'id_modelo';
}

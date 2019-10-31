<?php

namespace App\Models\Viaje\Bus;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table= 'bus';
    public $timestamps = false;
    protected $fillable = [
        'placa','business_name','color_id_color','modelo_id_modelo',
        'chofer_dpi'
    ];

    protected $primaryKey = 'placa';
}

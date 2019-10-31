<?php

namespace App\Models\Viaje\Bus;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table= 'color';
    public $timestamps = false;
    protected $fillable = [
        'id_color','color'
    ];

    protected $primaryKey = 'id_color';
}

<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table= 'municipio';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio','nombre_municipio'
    ];

    protected $primaryKey = 'id_municipio';
}

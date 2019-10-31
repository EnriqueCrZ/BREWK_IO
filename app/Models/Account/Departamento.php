<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table= 'departamento';
    public $timestamps = false;
    protected $fillable = [
        'id_departamento','nombre_departamento'
    ];

    protected $primaryKey = 'id_departamento';
}

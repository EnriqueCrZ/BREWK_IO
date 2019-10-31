<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table= 'account';
    public $timestamps = false;
    protected $fillable = [
        'dpi','nombre_completo','nit','celular','telefono',
        'municipio_id_municipio','departamento_id_departamento','users_id'
    ];

    protected $primaryKey = 'dpi';
}

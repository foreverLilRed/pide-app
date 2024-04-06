<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credencial extends Model
{
    protected $table = 'credenciales';

    protected $fillable = [
        'servicio',
        'usuario',
        'clave',
        'entidad',
        'ruc',
        'ippublica',
        'mac',
    ];
}

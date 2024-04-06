<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model
{
    protected $table = 'busquedas';

    protected $fillable = [
        'dni',
        'apa',
        'ama',
        'nombres',
        'estado' ,
        'ubigeo',
        'restriccion',
        'foto',
        'resultado'
    ];
}

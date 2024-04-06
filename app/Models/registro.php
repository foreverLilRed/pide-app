<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table = 'registros';

    protected $fillable = [
        'usuario',
        'servicio',
        'descripcion',
        'usuarioid',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarioid');
    }
    
}

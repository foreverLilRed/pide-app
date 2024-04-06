<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';

    protected $fillable = [
        'group_id',
        'servicio',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'group_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $fillable = [
        'id',
        'nombre',
    ];

    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'group_id');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'group_id');
    }

}

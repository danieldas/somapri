<?php

namespace App\Models;

use Eloquent as Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';

    public $fillable = ['id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'ci'
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->attributes['nombre'] . ' ' .
            $this->attributes['apellido_paterno'] . ' ' .
            $this->attributes['apellido_materno'];
    }
}

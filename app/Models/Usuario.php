<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User;

use Hash;

class Usuario extends User
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';

    public $fillable = ['id',
    'nombre', 'apellido_paterno', 'apellido_materno',
        'ci',
    'cuenta', 'password',
    'alta', 'rol'
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->attributes['nombre'] . ' ' .
            $this->attributes['apellido_paterno'] . ' ' .
            $this->attributes['apellido_materno'];
    }

    public function setPasswordAttribute($value)
    {
        if($value !== null)
            $this->attributes['password'] = bcrypt($value);
    }

    public function esAdministrador()
    {
        return $this->rol === 'Administrador';
    }


}

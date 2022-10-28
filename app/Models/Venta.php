<?php

namespace App\Models;

use Eloquent as Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'id';

    public $fillable = ['id',
        'cantidad',
        'fecha',
        'es_facturado',
        'producto_id',
        'cliente_id'
    ];

    public function getPrecioAttribute()
    {
        $producto = Producto::find($this->producto_id);
        $monto = ($producto->precio_unitario + ($producto->precio_unitario *$producto->utilidad/100)) * $this->cantidad;

        if ($this->es_facturado)
            $monto = $monto + ($monto * 0.13);

        return $monto;
    }

    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class);
    }

    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

}

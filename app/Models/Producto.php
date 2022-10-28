<?php

namespace App\Models;

use Eloquent as Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id';

    public $fillable = ['id',
        'codigo',
        'descripcion',
        'origen',
        'fabrica',
        'utilidad',
        'precio_unitario'
    ];

    public function getStockAttribute()
    {
        $compras = Compra::whereProductoId($this->id)->sum('cantidad');
        $ventas = Venta::whereProductoId($this->id)->sum('cantidad');

        return ($compras-$ventas);
    }

    public function getFechaPrimeraAttribute()
    {
        $compra = Compra::whereProductoId($this->id)->first();

        return date( 'd/m/Y', strtotime($compra->fecha));
    }


    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class);
    }

}

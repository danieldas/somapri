<?php

namespace App\Models;

use Eloquent as Model;

class Compra extends Model
{
    protected $table = 'compra';
    protected $primaryKey = 'id';

    public $fillable = ['id',
        'cantidad',
        'fecha',
        'producto_id'
    ];

//    public function getClubActualAttribute()
//    {
//        $consulta=
//            \DB::select("SELECT	club.nombre FROM club
//	                        INNER JOIN campeonato_club ON club.id = campeonato_club.club_id
//	                        INNER JOIN inscripcion_jugador ON campeonato_club.id = inscripcion_jugador.campeonato_club_id
//	                        where inscripcion_jugador.jugador_id = ?
//	                        order by inscripcion_jugador.id desc
//	                        limit 1", [$this->id]);
//
//        if(empty($consulta))
//        {
//            $consulta='';
//        }
//        else{
//            $consulta=$consulta[0]->nombre;
//        }
//        return $consulta;
//    }

    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class);
    }

}

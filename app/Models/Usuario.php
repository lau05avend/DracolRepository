<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relacion uno a muchos
    public function Rol(){
        return $this->belongsTo(Rol::class);
    }
    public function TipoIdentificacion(){
        return $this->belongsTo(TipoIdentificacion::class);
    }

    //relacion muchos a muchos
    public function Actividades(){
        return $this->belongsToMany(Actividad::class)->withDefault([
            'aviso' => 'No hay  actividades asignadas',
        ]);
    }
}

/*
METODOS CHEVRES
- Usuario::find(3)->Actividades->orderBy('NombreActividad')->get();
-

*/

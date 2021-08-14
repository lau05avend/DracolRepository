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
    public function EstadoCivil(){
        return $this->belongsTo(EstadoCivil::class);
    }
    public function LugarNacimiento(){
        return $this->belongsTo(LugarNacimiento::class);
    }

    public function TipoIdentificacion(){
        return $this->belongsTo(TipoIdentificacion::class);
    }
     //relacion uno a muchos
     public function Novedades(){
        return $this->hasMany(Novedad::class);
     }
     public function Planillas(){
        return $this->hasMany(Planilla::class);
     }

    //relacion muchos a muchos
    public function Actividades(){
        return $this->belongsToMany(Actividad::class)->withTimestamps();
    }

    public function Obras(){
        return $this->belongsToMany(Obra::class)->withTimestamps();
    }
}

/*
METODOS CHEVRES
- Usuario::find(3)->Actividades->orderBy('NombreActividad')->get();
-

*/

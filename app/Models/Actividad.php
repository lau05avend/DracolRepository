<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $guarded = [];


    // relacion uno a muchos inversa
    public function Obra(){
        return $this->belongsTo(Obra::class);
    }

    // relacion uno a muchos inversa
    public function FaseTarea(){
        return $this->belongsTo(FaseTarea::class);
    }
    public function EstadoActividad(){
        return $this->belongsTo(EstadoActividad::class);
    }

    //relacion muchos a muchos
    public function Usuarios(){
        return $this->belongsToMany(Usuario::class)->withDefault([
            'aviso' => 'No hay  actividades asignadas',
        ]);
    }

    //Scopes
    public function scopeActive($query) {
        return $query->where('is_active', 1);
    }
}

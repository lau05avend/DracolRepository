<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    use HasFactory;
    protected $guarded = [];//proteger los datos por defecto

    public function Obra(){
        return $this->belongsTo(Obra::class);
    }

    //relacion uno a muchos
    public function secciones(){
        return $this->hasMany(seccion::class);
    }
    public function diseno(){
        return $this->belongsToMany(Material::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $guarded = [];  //desproteger los campos por defecto

    // relacion uno a muchos inversa
    public function TipoObra(){
        return $this->belongsTo(TipoObra::class);
    }

    //relacion uno a muchos
    public function Actividades(){
        return $this->hasMany(Actividad::class);
    }

    // relacion uno a muchos
    public function Disenos(){
        return $this->hasMany(Diseno::class);
    }


}

/*
para probar los registros registrados en la bd, se usa:
1. php artisan tinker
2. use app\models\Obra
3.   //para consultar alguna obra

4. $obra->Actividades;  //para acceder a todas las actividades de esa determinada obra.


SENTENCIAS CHEVRES ejs
- $user->posts()->where('active', 1)->get();
-$comment = Post::find(1)->comments()
                    ->where('title', 'foo')
                    ->first();

*/

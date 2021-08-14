<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveNovedadesRequest;
use App\Models\Actividad;
use App\Models\Cliente;
use App\Models\Novedad;
use App\Models\TipoNovedad;
use App\Models\Usuario;
use Illuminate\Http\Request;

class NovedadController extends Controller
{

    public function index()
    {
        $lista = Novedad::latest('updated_at')->paginate(5);   //paginacion de elementos
        return view('Novedad.index',compact('lista'));
    }


    public function create()//retorna a la vista
    {
     $TipoNov=TipoNovedad::all()->sortBy('id');
     $Acti=Actividad::all()->sortBy('id');
     $Usu=Usuario::all()->sortBy('id');
     $Cli=Cliente::all()->sortBy('id');

        return view('Novedad.create',[
        'tn'=>$TipoNov,
        'Act'=>$Acti,
        'Usua'=>$Usu,
        'Client'=>$Cli
        ]);

    }


    public function store(SaveNovedadesRequest $request)
    {
        Novedad::create($request->validated());
        return redirect()->route('novedad.index')->with('status',__('Novedad creada correctamente '));
    }


    public function show(Novedad $novedad)
    {
        //
    }


    public function edit(Novedad $novedad)
    {
     $TipoNov=TipoNovedad::all()->sortBy('id');
     $Acti=Actividad::all()->sortBy('id');
     $Usu=Usuario::all()->sortBy('id');
     $Cli=Cliente::all()->sortBy('id');

        return view('Novedad.edit', [
            'novedad' =>$novedad,
            'tn'=>$TipoNov,
            'Act'=>$Acti,
            'Usua'=>$Usu,
            'Client'=>$Cli
        ]);
    }


    public function update(SaveNovedadesRequest $request, Novedad $novedad)//actualizar novedad
    {
        $novedad->update($request->validated());
        return redirect()->route('novedad.index')->with('status',__('Novedad actualizada  correctamente'));
    }


    public function destroy(Novedad $novedad)//eliminar novedad
    {
        $novedad->delete();
        return redirect()->route('novedad.index')->with('status',__('Novedad eliminada correctamente'));
    }
}

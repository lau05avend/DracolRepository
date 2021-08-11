<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveActividadRequest;
use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\FaseTarea;
use App\Models\Obra;

class ActividadController extends Controller
{
    public function index()
    {
        $lista = Actividad::latest('updated_at')->paginate(5);   //paginacion de elementos
        return view('Actividad.index',[
            'lista' => $lista
        ]);
    }

    public function create()    //retorna la vista de crear
    {
        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        return view('Actividad.create',[
            'faseT' => $faseT,
            'estadoA' => $estadoA
        ]);
    }

    public function store(SaveActividadRequest $request)    // hace un insert en la base de datos
    {
        Actividad::create($request->validated());
        return redirect()->route('activity.index')->with('status',__('Actividad creada correctamente.'));
    }

    public function show(Actividad $actividad)
    {
        //
    }

    public function edit(Actividad $actividad)//retornar valores en edicion
    {
        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $obra = Obra::get()->sortBy('id');
        return view('Actividad.edit', [
            'actividad' => $actividad,
            'faseT' => $faseT,
            'estadoA' => $estadoA,
            'obra' => $obra
        ]);
    }

    public function update(Actividad $actividad, SaveActividadRequest $request)// actualizar
    {
        $actividad->update($request->validated());
        return redirect()->route('activity.index')->with('status',__('Actividad actualizada correctamente.'));
        // return $actividad;
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('activity.index')->with('status',__('Actividad eliminada correctamente.'));
    }
}

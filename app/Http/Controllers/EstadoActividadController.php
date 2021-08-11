<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEstadoActividadRequest;
use App\Models\EstadoActividad;
use Illuminate\Http\Request;

class EstadoActividadController extends Controller
{

    public function index()
    {
        $estadoactividad = EstadoActividad::get();
        return view('EstadoActividad.index',compact('estadoactividad'));
    }

    public function create()
    {
        return view('EstadoActividad.create');
    }


    public function store(SaveEstadoActividadRequest $request)
    {
        EstadoActividad::create($request->validated());
        return redirect()->route('estadoactividad.index')->with('status',__('Estado de actividad registrado correctamente.'));
    }


    public function show(EstadoActividad $estadoActividad)
    {
        //
    }


    public function edit(EstadoActividad $estadoactividad)
    {
        return view('estadoactividad.edit', [
         'estadoactividad' => $estadoactividad
        ]);
    }


    public function update(SaveEstadoActividadRequest $request, EstadoActividad $estadoActividad)
    {
        $estadoActividad($request->validated());
        return redirect()->route('estadoactividad.index')->with('status',__('Estado de Actividad actualizado correctamente.'));
    }


    public function destroy(EstadoActividad $estadoactividad)
    {
        $estadoactividad->delete();
        return redirect()->route('estadoactividad.index')->with('status',__('Estado de actividad eliminado correctamente.'));
    }
}

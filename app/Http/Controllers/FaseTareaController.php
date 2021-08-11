<?php

namespace App\Http\Controllers;

use App\Models\FaseTarea;
use Illuminate\Http\Request;

class FaseTareaController extends Controller
{

    public function index()
    {
        $lista = FaseTarea::get();
        return view('faseTarea.index',compact('lista'));
    }


    public function create()
    {
        return view('faseTarea.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'NombreFase'=>'required | unique:fase_tareas',
            'DescripcionFase' => ''
        ]);
        FaseTarea::create($request->only('NombreFase','DescripcionFase'));
        return redirect()->route('fasetarea.index')->with('status',__('Fase de Actividad registrada correctamente'));
    }


    public function show(FaseTarea $fasetarea)
    {
        //
    }


    public function edit(FaseTarea $fasetarea)
    {
        return view('faseTarea.edit', [
            'fasetarea' => $fasetarea
        ]);
    }


    public function update(Request $request, FaseTarea $fasetarea)
    {
        $request->validate([
            'NombreFase'=>'required | unique:fase_tareas',
            'DescripcionFase' => ''
        ]);
        $fasetarea->update($request->only('NombreFase','DescripcionFase'));
        return redirect()->route('fasetarea.index')->with('status',__('Fase de Actividad actualizada correctamente.'));
    }


    public function destroy(FaseTarea $fasetarea)
    {
        $fasetarea->delete();
        return redirect()->route('fasetarea.index')->with('status',__('Fase de Actividad eliminada correctamente.'));
    }
}

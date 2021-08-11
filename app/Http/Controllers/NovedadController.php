<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use Illuminate\Http\Request;

class NovedadController extends Controller
{

    public function index()
    {
        $lista = Novedad::get();
        $lista = Novedad::latest('created_at')->paginate(5);   //paginacion de elementos
        return view('Novedad.index',compact('lista'));
    }


    public function create()//retorna a la vista
    {

        return view('Novedad.create');

    }


    public function store(Request $request)
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
        return view('Novedad.edit', [
            'novedad' =>$novedad
        ]);
    }


    public function update(Request $request, Novedad $novedad)//actualizar novedad
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

<?php

namespace App\Http\Controllers;

use App\Models\seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{

    public function index()
    {
        $lista = seccion::get();
        $lista = seccion::latest('created_at')->paginate(5);   //paginacion de elementos
        return view('SeccionDiseno.index',compact('lista'));

    }


    public function create()
    {
        return view('SeccionDiseno.create',[

        ]);

    }


    public function store(Request $request)
    {
        seccion::create($request->validated());
        return redirect()->route('secciones.index')->with('status',__('secciones diseño creadas correctamente'));
    }


    public function show(seccion $seccion)
    {
        //
    }


    public function edit(seccion $seccion)
    {
        return view('SeccionDiseno.edit', [
            'secciones' => $seccion
        ]);
    }


    public function update(Request $request, seccion $seccion)
    {
        $seccion->update($request->validated());
        return redirect()->route('secciones.index')->with('status',__('secciones diseño actualizada correctamente'));
    }


    public function destroy(seccion $seccion)
    {
        $seccion->delete();
        return redirect()->route('secciones.index')->with('status',__('secciones eliminadas correctamente'));
    }
}

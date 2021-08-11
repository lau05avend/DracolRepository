<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function index()
    {
        $lista = Material::get();
        $lista = Material::latest('created_at')->paginate(5);   //paginacion de elementos
        return view('Material.index',compact('lista'));
    }


    public function create()
    {
        return view('Material.create',[

        ]);
    }


    public function store(Request $request)
    {
        material::create($request->validated());
        return redirect()->route('material.index')->with('status',__('material registrado correctamente'));
    }


    public function show(Material $material)
    {
        //
    }


    public function edit(Material $material)
    {
        return view('Material.edit', [
            'material' => $material
        ]);
    }


    public function update(Request $request, Material $material)
    {
        $material->update($request->validated());
        return redirect()->route('material.index')->with('status',__('material actualizado correctamente'));
    }


    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('material.index')->with('status',__('material eliminado correctamente'));
    }
}

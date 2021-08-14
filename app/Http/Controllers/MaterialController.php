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
        Material::create($request->validated());
        return redirect()->route('Material.index')->with('status',__('Material registrado correctamente'));
    }


    public function show(Material $Material)
    {
        //
    }


    public function edit(Material $Material)
    {
        return view('Material.edit', [
            'Material' => $Material
        ]);
    }


    public function update(Request $request, Material $Material)
    {
        $Material->update($request->validated());
        return redirect()->route('material.index')->with('status',__('Material actualizado correctamente'));
    }


    public function destroy(Material $Material)
    {
        $Material->delete();
        return redirect()->route('material.index')->with('status',__('Material eliminado correctamente'));
    }
}


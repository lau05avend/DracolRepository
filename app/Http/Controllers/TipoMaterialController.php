<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDisenosRequest;
use App\Http\Requests\SaveTipoMaterialRequest;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TipoMaterialController extends Controller
{
    public function index()
    {
        $lista = Tipomaterial::all()->sortBy('id');   //paginacion de elementos
        return view('Tipomaterial.index',[
            'lista' => $lista
        ]);
    }

    public function create()
    {
        return view('TipoMaterial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreTipoM' => ['required',Rule::unique('tipo_materials','NombreTipoM')->ignore($request)],
            'DescripcionMaterial' => 'required'
            ], [

            ], [
                'NombreTipoM' => 'Nombre Tipo Material',
            'DescripcionMaterial' => 'Descripcion Material'
        ]);
        TipoMaterial::create($request->only('NombreTipoM','DescripcionMaterial'));
        return redirect()->route('TipoMaterial.index')->with('status',__('Tipo Material registrado satisfactoriamente.'));
    }

    public function show(TipoMaterial $TipoMaterial)
    {
        //
    }

    public function edit(TipoMaterial $TipoMaterial)
    {
        return view('TipoMaterial.edit',[
            'TipoMaterial' => $TipoMaterial
        ]);
    }


    public function update(SaveTipoMaterialRequest $request, TipoMaterial $TipoMaterial)
    {
        $TipoMaterial->update($request->validated());
        return redirect()->route('TipoMaterial.index')->with('status',__('Tipo de material actualizado satisfactoriamente'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMaterial  $tipoMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMaterial $TipoMaterial)
    {
        $TipoMaterial->delete();
        return redirect()->route('TipoMaterial.index')->with('status', __('Tipo de material eliminado correctamente'));
    }
}

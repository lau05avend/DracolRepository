<?php

namespace App\Http\Controllers;

use App\Models\tipoObra;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class TipoObraController extends Controller
{
    public function index()
    {
        $tipoObra = tipoObra::get();
        return view('TipoObra.index',compact('tipoObra'));
    }

    public function create()
    {
        return view('TipoObra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TipoObra'=>'required | unique:tipo_obras',
            'DescripcionTO' => ''
        ]);
        tipoObra::create($request->only('TipoObra','DescripcionTO'));
        return redirect()->route('tipoobra.index')->with('status',__('Tipo de Obra creado correctamente.'));
    }

    public function show(tipoObra $tipoobra){
    }

    public function edit(tipoObra $tipoobra)
    {
        return view('TipoObra.edit',[
            'tipoobra' => $tipoobra
        ]);
    }

    public function update(Request $request, tipoObra $tipoobra)
    {
        $request->validate([
            'TipoObra'=>'required',
            'DescripcionTO' => ''
        ]);
        $tipoobra->update($request->only('TipoObra','DescripcionTO'));
        return redirect()->route('tipoobra.index')->with('status',__('Tipo de Obra actualizado correctamente.'));
    }

    public function destroy(tipoObra $tipoobra)
    {
        $tipoobra->delete();
        return redirect()->route('tipoobra.index')->with('status',__('Tipo de Obra eliminado correctamente.'));
    }
}

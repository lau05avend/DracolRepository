<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCiudadRequest;
use App\Models\LugarNacimiento;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LugarNacimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugarn = LugarNacimiento::all()->sortBy('id');
        return view('LugarNacimiento.index', compact('lugarn'));
    }

    public function create()
    {
        return view('LugarNacimiento.create');
    }

    public function store(SaveCiudadRequest $request)
    {
        LugarNacimiento::create($request->validated());
        /*$request->validate([
            'LugarNacimientoU' => ['required',Rule::unique('lugar_nacimientos','LugarNacimientoU')->ignore($request)]
            ], [], [
            'LugarNacimientoU' => 'Nombre de Ciudad'
            ]);LugarNacimiento::create($request->only('LugarNacimientoU'));*/
        return redirect()->route('ciudad.index')->with('status',__('Ciudad agregada satisfactoriamente.'));
    }

    public function show(LugarNacimiento $ciudad)
    {
        //
    }

    public function edit(LugarNacimiento $ciudad)
    {
        return view('LugarNacimiento.edit',[
            'ciudad' => $ciudad
        ]);
    }

    public function update(SaveCiudadRequest $request, LugarNacimiento $ciudad)
    {
        $ciudad->update($request->validated());
        return redirect()->route('ciudad.index')->with('status',__('Ciudad editada satisfactoriamente.'));
    }

    public function destroy(LugarNacimiento $ciudad)
    {
        $ciudad->delete();
        return redirect()->route('ciudad.index')->with('status',__('Ciudad eliminada satisfactoriamente.'));
    }
}

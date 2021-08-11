<?php

namespace App\Http\Controllers;

use App\Models\Planilla;
use Illuminate\Http\Request;

class PlanillaController extends Controller
{

    public function index()
    {
        $lista = Planilla::get();
        $lista = planilla::latest('created_at')->paginate(5);   //paginacion de elementos
        return view('Planilla.index',compact('lista'));
    }


    public function create()
    {
        return view('Planilla.create',[

        ]);
    }


    public function store(Request $request)
    {
        Planilla::create($request->validated());
        return redirect()->route('planilla.index')->with('status',__('planilla registrada correctamente '));
    }


    public function show(Planilla $planilla)
    {
        //uwu
    }

    public function edit(Planilla $planilla)
    {
        return view('Planilla.edit', [
            'planilla' => $planilla
        ]);
    }


    public function update(Request $request, Planilla $planilla)
    {
        $planilla->update($request->validated());
        return redirect()->route('planilla.index')->with('status',__('planilla actualizada correctamente'));
    }

    public function destroy(Planilla $planilla)
    {
        $planilla->delete();
        return redirect()->route('planilla.index')->with('status',__('planilla eliminanda correctamente'));
    }
}

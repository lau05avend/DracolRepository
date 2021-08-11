<?php

namespace App\Http\Controllers;

use App\Models\Diseno;
use Illuminate\Http\Request;

class DisenoController extends Controller
{

    public function index()
    {
        $lista = Diseno::get();
        $lista = Diseno::latest('created_at')->paginate(5);   //paginacion de elementos
        return view('Diseno.index',compact('lista'));
    }


    public function create()
    {
        return view('Diseno.create',[

        ]);

    }


    public function store(Request $request)
    {
        Diseno::create($request->validated());
        return redirect()->route('diseno.index')->with('status',__('diseño creado adecuadamente'));

    }


    public function show(Diseno $diseno)
    {
       //
    }


    public function edit(Diseno $diseno)
    {
        return view('Diseno.edit', [
            'diseno' => $diseno
        ]);
    }


    public function update(Request $request, Diseno $diseno)
    {
        $diseno->update($request->validated());
        return redirect()->route('diseno.index')->with('status',__('diseño actualizado correctamente'));
    }


    public function destroy(Diseno $diseno)
    {
        $diseno->delete();
        return redirect()->route('diseno.index')->with('status',__('diseño eliminado correctamente'));
    }
}

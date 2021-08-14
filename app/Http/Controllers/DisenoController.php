<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDisenosRequest;
use App\Http\Requests\SaveDiseñoRequest;
use App\Models\Diseno;
use Illuminate\Http\Request;
use App\Models\Obra;

class DisenoController extends Controller
{

    public function index()
    {
        $lista = Diseno::all();
        $lista = Diseno::latest('created_at')->paginate(3);   //paginacion de elementos
        return view('Diseno.index',["list"=>$lista]);
    }


    public function create()
    {



        $IdObra = Obra::get();
        return view('Diseno.create', [
            'IdObra' => $IdObra
        ]);
    }


    public function store(SaveDisenosRequest $request)
    {
        if($request->hasFile('ImagenPlano')){
            $name = $request->file('ImagenPlano')->getClientOriginalName();
            $request->file('ImagenPlano')->move('storage/perfil', $name);
        }

        $data = array_merge($request->validated(),['ImagenPlano' => "storage/perfil/{$name}"]);
        Diseno::create($data);


        Diseno::create($request->validated());
        return redirect()->route('diseno.index')->with('status',__('diseño creado adecuadamente'));
    }


    public function show(Diseno $diseno)
    {
       //
    }


    public function edit(Diseno $diseno)
    {
        $IdObra = Obra::get();
        return view('Diseno.edit', [
            'diseno' => $diseno,
            'IdObra' => $IdObra
        ]);
    }


    public function update(SaveDisenosRequest $request, Diseno $diseno)
    {
        if($request->hasFile('ImagenPlano')){
            $name = $request->file('ImagenPlano')->getClientOriginalName();
            $request->file('ImagenPlano')->move('storage/perfil', $name);
        }

        $data = array_merge($request->validated(),['ImagenPlano' => "storage/perfil/{$name}"]);
        $diseno->update($data);

        return redirect()->route('diseno.index')->with('status',__('diseño actualizado correctamente'));
    }


    public function destroy(Diseno $diseno)
    {
        $diseno->delete();
        return redirect()->route('diseno.index')->with('status',__('diseño eliminado correctamente'));
    }
}

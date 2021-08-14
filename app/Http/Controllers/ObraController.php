<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveObraFormRequest;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function index()
    {
        $obrastot = Obra::where('tipo_obra_id',1)
                    ->orderBy('cliente_id','desc')->get();
        $obrasdos = Obra::where('tipo_obra_id',2)
                    ->orderBy('cliente_id','desc')->get();

        $obras = Obra::latest('updated_at')->paginate(5);
        // dd($obras);
        return view('obra.index',[
            'obra' => $obras,
            'obrastot' => $obrastot,
            'obrasdos' => $obrasdos
        ]);
    }

    public function create()
    {
        $tipoO = TipoObra::get();
        $cliente = Cliente::get();

        return view('obra.create',[
            'tipo' => $tipoO,
            'cliente' => $cliente
        ]);
    }

    public function store(SaveObraFormRequest $request)
    {
        Obra::create($request->validated());
        return redirect()->route('obra.index')->with('status',__('Obra creado correctamente.'));
    }

    public function edit(Obra $obra)
    {
        $tipoO = TipoObra::get();
        $cliente = Cliente::get();
        return view('obra.edit',[
            'obra' => $obra,
            'tipo' => $tipoO,
            'cliente' => $cliente
        ]);
    }

    public function update(SaveObraFormRequest $request, Obra $obra)
    {
        $obra->update($request->validated());
        return redirect()->route('obra.index')->with('status',__('Obra actualizada correctamente.'));
    }

    public function destroy(Obra $obra)
    {
        $obra->delete();
        return redirect()->route('obra.index')->with('status',__('Obra eliminada correctamente.'));
    }

    public function desactive($met){
        return "hola".$met;
    }

    public function show(Obra $obra)
    {
        $usuarios = $obra->Usuarios()->get()->sortBy('id');
        return view('obra.show',[
            'obra' => $obra,  //pasar el proyecto a la vista
            'users' => $usuarios
        ]);
    }

    public function editUsers(Obra $obra){
        $usuarios = Usuario::all()->sortBy('id');
        return view('obra.Ousuario',[
            'obra' => $obra,
            'users' => $usuarios
        ]);
    }

    public function Usuarios(Request $request, Obra $obra)
    {
        $obra->Usuarios()->sync($request->Usuarios);
        return redirect()->route('obra.show',$obra)->with('success', __('Usuarios asignados exitosamente.'));
    }

    /*
    para fotos:
    if($request->hasFile('foto')){
        $obra['foto'] = $request->file('foto')->store('uploads','public');    //copia la ruta del archivo en la bd, y sube la foto a la carpeta uploads
    }
    */
}

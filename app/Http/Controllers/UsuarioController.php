<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUsuariosRequest;
use App\Models\EstadoCivil;
use App\Models\LugarNacimiento;
use App\Models\Rol;
use App\Models\TipoIdentificacion;
use App\Models\Usuario;
use Illuminate\Support\Arr;

class UsuarioController extends Controller
{

    public function index()
    {
    //   $lista = Usuario::with('')->get();
      $roles = Rol::get();
      $lista = Usuario::latest('updated_at')->paginate(8);   //paginacion de elementos

      return view('Usuario.index',compact('lista','roles'));

    }


    public function create()// retorna a la vistaa crear
    {
        $roles = Rol::get();
        $tipo_id = TipoIdentificacion::get();
        $lugar= LugarNacimiento::get();
        $estadoc = EstadoCivil::get();

        return view('Usuario.create',[
            'rol' => $roles,
            'tipoi' => $tipo_id,
            'lugar' => $lugar,
            'ec' => $estadoc

        ]);
   }


    public function store(SaveUsuariosRequest $request)//crear usuario o insertar usuario
    {
        if($request->hasFile('FotoUsuario')){
            $name = $request->file('FotoUsuario')->getClientOriginalName();
            $request->file('FotoUsuario')->move('storage/perfil', $name);
        }

        $data = array_merge(Arr::except($request->validated(),'confcontrasena'),['FotoUsuario' => "storage/perfil/{$name}"]);
        Usuario::create($data);

        return redirect()->route('usuarios.index')->with('status',__('Usuario creado correctamente.'));
    }


    public function show(Usuario $usuario)
    {
        //
    }


    public function edit(Usuario $usuario) //retornar valores en edicion
    {
        $roles = Rol::get();
        $tipo_id = TipoIdentificacion::get();
        $lugar= LugarNacimiento::get();
        $estadoc = EstadoCivil::get();
        return view('Usuario.edit', [
            'usuario' => $usuario,
            'rol' => $roles,
            'tipoi' => $tipo_id,
            'lugar' => $lugar,
            'ec' => $estadoc
        ]);
    }


    public function update(SaveUsuariosRequest $request, Usuario $usuario)// actualizar
    {
        if($request->hasFile('FotoUsuario')){
            $name = $request->file('FotoUsuario')->getClientOriginalName();
            $request->file('FotoUsuario')->move('storage/perfil', $name);


        $data = array_merge(Arr::except($request->validated(),'confcontrasena'),['FotoUsuario' => "storage/perfil/{$name}"]);
        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('status',__('Usuario actualizado correctamente'));
   } }


    public function destroy(Usuario $usuario)// eliminar usuario
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('status',__('Usuario eliminado correctamente.'));

    }
}

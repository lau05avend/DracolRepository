<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveClienteRequest;
use App\Models\Cliente;
use App\Models\TipoCliente;
use App\Models\TipoIdentificacion;
use Illuminate\Support\Arr;

class ClienteController extends Controller
{

    public function index()
    {
        $lista = Cliente::latest('updated_at')->paginate(5);   //paginacion de elementos
        return view('Clientes.index',[
            'lista' => $lista
        ]);
    }

    public function create()//retorna a la vista
    {
        $tipoc = TipoCliente::get();
        $tipoi = TipoIdentificacion::get();
        return view('Clientes.create',[
            'tipoc' => $tipoc,
            'tipoi'=> $tipoi
        ]);
    }

    public function store(SaveClienteRequest $request)//CrearClientes
    {

        if($request->hasFile('FotoL')){
            $name = $request->file('FotoL')->getClientOriginalName();
            $request->file('FotoL')->move('storage/perfil', $name);
        }

        $data = array_merge($request->validated(),['FotoL' => "storage/perfil/{$name}"]);
        Cliente::create($data);

        return redirect()->route('clientes.index')->with('status',__('Cliente creado correctameente'));
    }

    public function show(Cliente $cliente)
    {
        //
    }
    public function edit(Cliente $cliente)
    {
        $tipoc = TipoCliente::all();
        $tipoi = TipoIdentificacion::all();
        return view('Clientes.edit', [
            'cliente' => $cliente,
            'tipoc' => $tipoc,
            'tipoi'=> $tipoi
        ]);
    }

    public function update(SaveClienteRequest $request, Cliente $cliente)//actualizar cliente
    {

    if($request->hasFile('FotoL')){
           $name = $request->file('FotoL')->getClientOriginalName();
            $request->file('FotoL')->move('storage/perfil', $name);
            $data = array_merge($request->validated(),['FotoL' => "storage/perfil/{$name}"]);
            $cliente->update($data);
        }
    else{
        $cliente->update($request->validated());
    }
    return redirect()->route('clientes.index')->with('status',__('Cliente actualizado satisfactoriamente.'));
    }

    public function destroy(Cliente $cliente)//eliminar cliente
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('status',__('Cliente eliminado correctamente'));

    }
}

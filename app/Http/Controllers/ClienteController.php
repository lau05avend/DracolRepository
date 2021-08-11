<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoCliente;
use App\Models\TipoIdentificacion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $lista = Cliente::get();
        $lista = Cliente::latest('created_at')->paginate(5);   //paginacion de elementos
        return view('Clientes.index',compact('lista'));
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


    public function store(Request $request)//CrearClientes
    {
        Cliente::create($request->validated());
        return redirect()->route('clientes.index')->with('status',__('Cliente creado correctameente'));
    }


    public function show(Cliente $cliente)
    {
        //
    }


    public function edit(Cliente $cliente)
    {
        return view('Clientes.edit', [
            'cliente' => $cliente
        ]);
    }


    public function update(Request $request, Cliente $cliente)//actualizar cliente
    {
        $cliente->update($request->validated());
        return redirect()->route('clientes.index')->with('status',__('actualizar cliente '));
    }


    public function destroy(Cliente $cliente)//eliminar cliente
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('status',__('cliente eliminado correctamente'));

    }
}

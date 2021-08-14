@extends('partials/nav')

@section('title','Obras')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-acti.css'); }}">
@endsection

@section('content')
    <!--========== CONTENT ==========-->
    @if (session('status'))
    <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
        <p id="messag">{{ session('status') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="form">

        <h1>Lista de Obras</h1><br>
        <a class="buttonN" href="{{ route('obra.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Obra</th>
                        <th>Dirección Obra</th>
                        <th>Ciudad Obra</th>
                        <th>Estado Obra</th>
                        <th>Creada en</th>
                        <th>Actualizada en</th>
                        <th>Cliente</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($obra as $obras)
                    <tr>
                        <td>{{ $obras->id }}</td>
                        <td>{{ $obras->NombreObra }}</td>
                        <td>{{ $obras->DireccionObra }}</td>
                        <td>{{ $obras->CiudadObra }}</td>
                        <td>{{ $obras->EstadoObra}}</td>
                        <td>{{ date_format($obras->created_at, 'jS M Y') }}</td>
                        <td>{{ $obras->updated_at? $obras->updated_at :'' }}</td>
                        <td>{{ $obras->cliente->NombreCC }}</td>
                        <td><a href="{{ route('obra.show',$obras) }}" class="bg-red-400 butt hover:bg-red-300"><button>Detalles</button></a></td>
                        <td><a href="{{ route('obra.edit',$obras) }}" class="bg-yellow-200 butt hover:bg-yellow-300"><button>Editar</button></a></td>

                        <td><form action="{{ route('obra.destroy',$obras->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-gray-400 butt butt hover:bg-gray-300" onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $obra->links() }}

    </div>
@endsection

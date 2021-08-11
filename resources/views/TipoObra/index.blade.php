@extends('partials/nav')

@section('title','Tipos Obra')

@section('content')
    <!--========== CONTENT ==========-->
    @if (session('status'))
    <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
        <p id="messag">{{ session('status') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="form">

        <h1>Lista Tipos de Obra</h1><br>
        <a class="buttonN" href="{{ route('tipoobra.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo Obra</th>
                        <th>Descripción</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($tipoObra as $tipoObra)
                    <tr>
                        <td>{{ $tipoObra->id }}</td>
                        <td>{{ $tipoObra->TipoObra }}</td>
                        <td>{{ $tipoObra->DescripcionTO }}</td>
                        {{-- {{ $l }} --}}
                        <td><a href="{{ route('tipoobra.edit',$tipoObra) }}"><button>Editar</button></a></td>

                        <td><form action="{{ route('tipoobra.destroy',$tipoObra->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

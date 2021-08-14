@extends('partials/nav')

@section('title','Actividad')

@section('content')
    <!--========== CONTENT ==========-->
    @if (session('status'))
    <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
        <p id="messag">{{ session('status') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="form">

        <h1>Lista Estado de Actividades</h1><br>
        <a class="buttonN" href="{{ route('estadoactividad.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Estado Actividad</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($estadoactividad as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->NombreEstado }}</td>
                        <td><a class="view_data" href="{{ route( 'estadoactividad.edit',['estadoactividad'=>$l]) }}"><button>Editar</button></a></td>

                        <td><form action="{{ route('estadoactividad.destroy',$l->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>

@endsection

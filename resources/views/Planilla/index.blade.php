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

        <h1>Lista de actividades</h1><br>
        <a class="buttonN" href="{{ route('activity.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Actividad</th>
                        <th>Descripcion</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Creada en</th>
                        <th>Actualizada en</th>
                        <th>Estado</th>
                        <th>Fase</th>
                        <th>Obra</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($lista as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->NombreActividad }}</td>
                        <td>{{ $l->DescripcionActividad }}</td>
                        <td>{{ $l->FechaInicioA }}</td>
                        <td>{{ $l->FechaFinA }}</td>
                        <td>{{ date_format($l->created_at, 'jS M Y') }}</td>
                        <td>{{ $l->updated_at? $l->updated_at :'' }}</td>
                        <td>{{ $l->estado_actividad_id }}</td>
                        <td>{{ $l->fase_tarea_id }}</td>
                        <td>{{ $l->obra_id }}</td>
                        <td><button><a href="{{ route('activity.edit',$l) }}" class="bg-red-400 butt hover:bg-red-300">Editar</a></button></td>

                        <td><form action="{{ route('activity.destroy',$l->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-yellow-200 butt hover:bg-yellow-300" onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $lista->links() }}
    </div>
@endsection

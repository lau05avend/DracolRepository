@extends('partials/nav')

@section('title','Actividad')

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

        <h1>Lista de Actividades</h1><br>
        <a class="buttonN" href="{{ route('activity.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Actividad</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Obra</th>
                        <th>Creada en</th>
                        <th>Actualizada en</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($lista as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->NombreActividad }}</td>
                        <td>{{ date_format($l->created_at, 'd-m-Y h:i:s A') }}</td>
                        <td>{{ $l->updated_at?date('d-m-Y h:i:s A', strtotime($l->updated_at )) :'-' }}</td>
                        <td>{{ $l->Obra->NombreObra }}</td>
                        <td>{{ $l->FechaInicioA?date('d-m-Y h:i:s A', strtotime($l->FechaInicioA )):'-' }}</td>
                        <td>{{ $l->FechaFinA? date('d-m-Y h:i:s A', strtotime($l->FechaFinA )):'-' }}</td>
                        <td><a href="{{ route('activity.show',$l) }}" class="bg-red-400 butt hover:bg-red-300"><button>Detalles</button></a></td>
                        <td><a href="{{ route('activity.edit',$l) }}" class="bg-yellow-200 butt hover:bg-yellow-300"><button>Editar</button></a></td>

                        <td><form action="{{ route('activity.destroy',$l->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-gray-400 butt butt hover:bg-gray-300" onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $lista->links() }}
    </div>
@endsection

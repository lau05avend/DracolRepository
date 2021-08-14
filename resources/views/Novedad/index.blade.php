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

        <h1>Novedades</h1><br>
        <a class="buttonN" href="{{ route('novedad.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>AsuntoNovedad</th>
                        <th>EstadoNovedad</th>
                        <th>DescripcionN</th>
                        <th>tipo_novedad</th>
                        <th>actividad</th>
                        <th>usuario</th>
                        <th>cliente</th>
                        <th>Registrado en</th>
                        <th>Actualizado</th>

                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($lista as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->AsuntoNovedad }}</td>
                        <td>{{ $l->EstadoNovedad }}</td>
                        <td>{{ $l->DescripcionN }}</td>
                        <td>{{ $l->TipoNovedad->NombreTipoN }}</td>
                        <td>{{ $l->Actividad->NombreActividad }}</td>
                        <td>{{ $l->Usuario?$l->Usuario->NombreUsuario.' '.$l->Usuario->ApellidosUsuario :'-' }}</td>
                        <td>{{ $l->Cliente?$l->Cliente->NombreCC:'-' }}</td>
                        <td>{{ date_format($l->created_at, 'jS M Y') }}</td>
                        <td>{{ $l->updated_at? $l->updated_at :'' }}</td>
                        <td><button><a href="{{ route('novedad.edit',$l) }}" class="bg-red-400 butt hover:bg-red-300">Editar</a></button></td>

                        <td><form action="{{ route('novedad.destroy',$l->id) }}" method="POST">
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

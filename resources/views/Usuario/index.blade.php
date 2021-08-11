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

        <h1>Lista de Usuarios</h1><br>
        <a class="buttonN" href="{{ route('usuarios.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre </th>
                        <th>Apellido </th>
                        <th>Tipo.Doc </th>
                        <th>Num.Documento</th>
                        <th>Lugar de Nac. </th>
                        <th>Estado civil </th>
                        <th>Num.Celular</th>
                        <th>Num.Telefono</th>
                        <th>FechadeNac.</th>
                        <th>Correo </th>
                        <th>Genero </th>
                        <th>Dierección </th>
                        <th>Contraseña </th>
                        <th>Disponibilidad </th>
                        <th>EstadoUsuario</th>
                        <th>Rol </th>
                        <th>FotoUsuario</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($lista as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->NombreUsuario }}</td>
                        <td>{{ $l->ApellidosUsuario }}</td>
                        <td>{{ $l->tipo_identificacion_id }}</td>
                        <td>{{ $l->NumeroDocumento }}</td>
                        <td>{{ $l->lugar_nacimiento_id }} </td>
                        <td>{{ $l->estado_civil_id }}</td>
                        <td>{{ $l->NumeCelular }}</td>
                        <td>{{ $l->NumTelefono }}</td>
                        <td>{{ $l->FechaNacimientoU }}</td>
                        <td>{{ $l->CorreoUsuario }}</td>
                        <td>{{ $l->GeneroUsuario }}</td>
                        <td>{{ $l->DireccionUsuario }}</td>
                        <td>{{ $l->contrasena }}</td>
                        <td>{{ $l->Disponibilidad }}</td>
                        <td>{{ $l->EstadoUsuario }}</td>
                        <td>{{ $l->Rol->NombreRol }}</td>
                        <td>{{ $l->FotoUsuario }}
                        <td><a href="{{ route('usuarios.edit',$l) }}"><button>Editar</button></a></td>

                        <td><form action="{{ route('usuarios.destroy',$l->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $lista->links() }}
    </div>
@endsection

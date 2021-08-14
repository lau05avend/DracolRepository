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
        <h1>Lista de Clientes</h1><br>
        <a class="buttonN" href="{{ route('clientes.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Completo</th>
                        <th>Num.Documento</th>
                        <th>Tipo Identificacion </th>
                        <th>E-mail </th>
                        <th>Num.Celular</th>
                        <th>Num.Telefono</th>
                        <th>Tipo de Cliente</th>
                        <th>Creado en</th>
                        <th>Actualizado en </th>
                        <th>Foto </th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($lista as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->NombreCC }}</td>
                        <td>{{ $l->NumIdentificacion }}</td>
                        <td>{{ $l->TipoIdentificacion->TipoIdentificacion  }}</td>
                        <td>{{ $l->CorreoCliente }}</td>
                        <td>{{ $l->NumCelular }}</td>
                        <td>{{ $l->NumTelefono }} </td>
                        <td>{{ $l->TipoCliente->nombreTipoC }}</td>
                        <td>{{ $l->created_at?date('d-m-Y h:i:s A', strtotime($l->created_at )) : '-' }}</td>
                        <td>{{ $l->updated_at?date('d-m-Y h:i:s A', strtotime($l->updated_at )) :'-' }}</td>
                        <td><img src="{{$l->FotoL }}" alt="" class="imagenusuario" width="80%" height="80%"></td>

                        <td><a href="{{ route('clientes.edit',$l) }}" class="bg-red-400 butt hover:bg-red-300"><button>Editar</button></a></td>

                        <td><form action="{{ route('clientes.destroy',$l->id) }}" method="POST">
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

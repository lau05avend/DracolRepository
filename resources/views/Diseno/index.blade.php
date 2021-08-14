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
        <a class="buttonN" href="{{ route('diseno.create') }}">NUEVO</a><br><br>
        <div class="div-tab">
            <table class="table-cli">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>IdObra</th>
                        <th>ImagenPlano</th>
                        <th>ObservacionDiseno</th>
                        <th>FechaRegistroD</th>
                        <th>Actualizado en</th>


                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($list as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->Obra->NombreObra }}</td>
                        <td><img src="{{$l->ImagenPlano }}" alt="" class="imagenusuario" width="300px" height="150px"></td>
                        <td>{{ $l->ObservacionDiseno }}</td>
                        <td>{{ $l->created_at }}</td>
                        <td>{{ $l->updated_at }}</td>


                        <td><button><a href="{{ route('diseno.edit',$l) }}" class="bg-red-400 butt hover:bg-red-300">Editar</a></button></td>

                        <td><form action="{{ route('diseno.destroy',$l->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-yellow-200 butt hover:bg-yellow-300" onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $list->links() }}
    </div>
@endsection

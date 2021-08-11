@extends('partials/nav')

@section('title','Obras')

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
                        <th>Medida Área</th>
                        <th>Medida Perimetro</th>
                        <th>Material Suelo</th>
                        <th>Dirección Obra</th>
                        <th>Ciudad Obra</th>
                        <th>Estado Obra</th>
                        <th>Creada en</th>
                        <th>Actualizada en</th>
                        <th>Tipo Obra</th>
                        <th>Cliente</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodyC">
                    @foreach ($obra as $obras)
                    <tr>
                        <td>{{ $obras->id }}</td>
                        <td>{{ $obras->NombreObra }}</td>
                        <td>{{ $obras->MedidaArea }}</td>
                        <td>{{ $obras->MedidaPerimetro }}</td>
                        <td>{{ $obras->TipoMaterialSuelo }}</td>
                        <td>{{ $obras->DireccionObra }}</td>
                        <td>{{ $obras->CiudadObra }}</td>
                        <td>{{ $obras->EstadoObra}}</td>
                        <td>{{ date_format($obras->created_at, 'jS M Y') }}</td>
                        <td>{{ $obras->updated_at? $obras->updated_at :'' }}</td>
                        <td>{{ $obras->TipoObra->TipoObra }}</td>
                        <td>{{ $obras->cliente_id }}</td>
                        <td><a href="{{ route('obra.edit',$obras) }}"><button>Editar</button></a></td>

                        <td><form action="{{ route('obra.destroy',$obras->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button onclick="javascript:return confirm('¿Está seguro que desea eliminar el registro?');">Eliminar</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $obra->links() }}

    </div>
@endsection

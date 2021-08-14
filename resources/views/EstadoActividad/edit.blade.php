@extends('partials/nav')

@section('title','Estado Actividad | Editar')

@section('content')

<div class="form" id="form">
    <a href="{{ route('estadoactividad.index') }}" class="btn btn-dark">Volver</a><br><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ __($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" action="{{ route('estadoactividad.update',$estadoactividad) }}" class="form-ob" method="POST">
        @csrf   @method('PATCH')
        <h1>Actualizar Estado Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreA">Nombre  Estado Actividad:</label>
                <input type="text" name="NombreEstado" id="NombreA" value="{{ $estadoactividad->NombreEstado }}" placeholder="Nombre Estado Actividad"><br>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('estadoactividad.index') }}" class="btn btn-dark buttonN">Volver</a>

    <br><br>
</div>

@endsection

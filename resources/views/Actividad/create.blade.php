@extends('partials/nav')

@section('title','Actividad | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('activity.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('activity.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreA">Nombre Actividad:</label>
                <input type="text" name="NombreActividad" id="NombreA" value="{{ old('NombreActividad') }}" placeholder="Nombre Actividad"><br>
            </p>
            <p>
                <label for="detac">Descripción Actividad:</label><br>
                <textarea name="DescripcionActividad" id="detac" cols="85" value="{{ old('DescripcionActividad') }}" rows="3"></textarea>
            </p>
            <p>
                <label for="fecI">Fecha de Inicio:</label>
                <input type="datetime-local" id="fecI" class="inpt" value="{{ old('FechaInicioA') }}" name="FechaInicioA"><br>
            </p>
            <p>
                <label for="fecF">Fecha de Fin:</label>
                <input type="datetime-local" id="fecF" class="inpt" value="{{ old('FechaFinA') }}" name="FechaFinA"><br>
            </p>
            <p>
                <label for="estad">Estado de Actividad:</label>
                <select name="estado_actividad_id" class="inpt" id="estad">
                    <option value="">Seleccione</option>
                    @foreach ($estadoA as $e)
                        <option value="{{ $e->id }}">{{ $e->NombreEstado }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="fase_t">Fase de actividad:</label>
                <select name="fase_tarea_id" class="inpt" id="fase_t">
                    <option value="">Seleccione</option>
                    @forelse ($faseT as $f)
                        <option value="{{ $f->id }}">{{ $f->NombreFase }}</option>
                    @empty
                        <option value="">No hay fases disponibles</option>
                    @endforelse
                </select>
            </p>

            <p>
                <label for="obr">Obra:</label>
                <input type="number" class="inpt" id="obr" name="obra_id" value="3">
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('activity.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

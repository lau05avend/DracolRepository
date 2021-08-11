@extends('partials/nav')

@section('title','Actividad | Editar')

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

    <form enctype="multipart/form-data" action="{{ route('activity.update',$actividad) }}" class="form-ob" method="POST">

        @csrf   @method('PATCH')
        <h1>Actualizar Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreA">Nombre Actividad:</label>
                <input type="text" name="NombreActividad" id="NombreA" value="{{ old('NombreActividad',$actividad->NombreActividad ) }}" placeholder="Nombre Actividad"><br>
            </p>
            <p>
                <label for="detac">Descripción Actividad:</label><br>
                <textarea name="DescripcionActividad" id="detac" cols="85" rows="3">{{ old('DescripcionActividad',$actividad->DescripcionActividad) }}</textarea>
            </p>
            <p>
                <label for="fecI">Fecha de Inicio:</label>
                <input type="datetime-local" id="fecI" class="inpt" value="{{  old('FechaInicioA',date('Y-m-d\TH:i', strtotime($actividad->FechaInicioA) ))  }}" name="FechaInicioA"><br>
            </p>
            <p>
                <label for="fecF">Fecha de Fin:</label>
                <input type="datetime-local" class="inpt" id="fecF" value="{{ old('FechaFinA',date('Y-m-d\TH:i', strtotime($actividad->FechaFinA))) }}" name="FechaFinA" /><br>
            </p>
            <p>
                <label for="estad">Estado de Actividad:</label>
                <select name="estado_actividad_id" class="inpt" id="estad">
                    <option value="">Seleccione</option>
                    @foreach ($estadoA as $e)
                        <option value="{{ $e->id }}" @if(old('estado_actividad_id',$actividad->estado_actividad_id) == $e->id) selected @endif>
                            {{ $e->NombreEstado }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="fase_t">Fase de actividad:</label>
                <select name="fase_tarea_id" class="inpt" id="fase_t">
                    <option value="">Seleccione</option>
                    @forelse ($faseT as $f)
                        <option value="{{ $f->id }}" @if(old('fase_tarea_id',$actividad->fase_tarea_id) == $f->id) selected @endif >
                            {{ $f->NombreFase }}</option>
                    @empty
                        <option value="">No hay fases disponibles</option>
                    @endforelse
                </select>
            </p>
            <p>
                <label for="obr">Obra:</label>
                <select name="obra_id" class="inpt" id="obr">
                    <option value="">Seleccione</option>
                    @forelse ($obra as $o)
                        <option value="{{ $o->id }}" @if(old('obra_id',$actividad->obra_id) == $o->id) selected @endif>
                            {{ $o->NombreObra }}</option>
                    @empty
                        <option value="">No hay fases disponibles</option>
                    @endforelse
                </select>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('activity.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

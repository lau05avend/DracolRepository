@extends('partials/nav')

@section('title','Actividad | Editar')

@section('content')

<div class="form" id="form">
    <a href="{{ route('diseno.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('diseno.update',$actividad) }}" class="form-ob" method="POST">
        
        @csrf   @method('PATCH')
        <h1>Actualizar Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreA">Nombre Actividad:</label>
                <input type="text" name="NombreActividad" id="NombreA" value="{{ $actividad->NombreActividad }}" placeholder="Nombre Actividad"><br>
            </p>
            <p>
                <label for="detac">Descripción Actividad:</label><br>
                <textarea name="DescripcionActividad" id="detac" cols="85" rows="3">{{ $actividad->DescripcionActividad }}</textarea>
            </p>
            <p>
                <label for="fecI">Fecha de Inicio:</label>
                <input type="datetime-local" id="fecI" class="datepicker" value="{{ date_create_from_format('Y-m-d',$actividad->FechaInicioA)  }}" name="FechaInicioA"><br>
            </p>
            <p>
                <label for="fecF">Fecha de Fin:</label>
                <div  id="datepicker">
                    <input type="datetime-local" id="fecF" class="datapicker" my-date-format="DD/MM/YYYY, hh:mm:ss" value="05/08/2021 09:25pm" name="FechaFinA">
                </div><br>
            </p>
            <p>
                <label for="estad">Estado de Actividad:</label>
                <select name="estado_actividad_id" value="{{ $actividad->estado_actividad_id }}" class="inpt" id="estad">
                    <option value="">Seleccione</option>
                    <option value="1">Sin empezar</option>
                    <option value="2">En progreso</option>
                    <option value="3">Atrasado</option>
                    <option value="4">Completo</option>
                </select>
            </p>
            <p>
                <label for="fase_t">Fase de actividad:</label>
                <select name="fase_tarea_id" value="{{ $actividad->fase_tarea_id }}" class="inpt" id="fase_t">
                    <option value="">Seleccione</option>
                    <option value="1">Recolección de Información</option>
                    <option value="2">Preparación y Diseño</option>
                    <option value="3">Desarrollo e Implementación</option>
                    <option value="4">Fase de Evaluación y Control</option>
                    <option value="5">Fase de Cierre</option>
                </select>
            </p>
            <p>
                <label for="obr">Obra:</label>
                <input type="number" class="inpt" id="obr" value="{{ $actividad->obra_id }}" name="obra_id" value="3">
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('activity.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

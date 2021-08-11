@extends('partials/nav')

@section('title','Actividad | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('fasetarea.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('fasetarea.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Registro Fase de Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreFase">Nombre Fase de Actividad:</label>
                <input type="text" name="NombreFase" id="NombreFase" value="{{ old('NombreFase') }}" placeholder="Nombre Fase"><br>
            </p>
            <p>
                <label for="detfa">Descripción de Fase de Actividad:</label><br>
                <textarea name="DescripcionFase" id="detfa" cols="85" value="{{ old('DescripcionFase') }}" rows="3"></textarea>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('fasetarea.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

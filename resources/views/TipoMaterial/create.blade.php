@extends('partials/nav')

@section('title','TipoMaterial | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('TipoMaterial.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('TipoMaterial.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreTipoM">Nombre Actividad:</label>
                <input type="text" name="NombreTipoM" id="NombreA" value="{{ old('NombreTipoM') }}" placeholder="Nombre Actividad"><br>
            </p>
            <p>
                <label for="detac">Descripción Actividad:</label><br>
                <textarea name="DescripcionMaterial" id="detac" cols="85" value="{{ old('DescripcionMaterial') }}" rows="3"></textarea>
            </p>

        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('TipoMaterial.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

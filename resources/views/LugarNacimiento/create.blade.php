@extends('partials/nav')

@section('title','Actividad | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('ciudad.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('ciudad.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Ciudades</h1>
        <div class="formula">
            <p>
                <label for="NombreC">Nombre de la Ciudad:</label>
                <input type="text" name="LugarNacimientoU" id="NombreC" value="{{ old('LugarNacimientoU') }}" placeholder="Ciudad"><br>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('ciudad.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

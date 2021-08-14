@extends('partials/nav')

@section('title','Actividad | Editar')

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

    <form enctype="multipart/form-data" action="{{ route('TipoMaterial.update',$TipoMaterial) }}" class="form-ob" method="POST">

        @csrf   @method('PATCH')
        <h1>Actualizar Actividad</h1>
        <div class="formula">
            <p>
                <label for="NombreTipoM">Tipo de material:</label>
                <input type="text" name="NombreTipoM" id="NombreTipoM" value="{{ $TipoMaterial->NombreTipoM }}" placeholder="Nombre Actividad"><br>
            </p>
            <p>
                <label for="DescripcionMaterial">Descripción:</label>
                <input type="text" name="DescripcionMaterial" id="DescripcionMaterial" value="{{ $TipoMaterial->DescripcionMaterial }}" placeholder="Nombre Actividad"><br>
            </p>



        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('TipoMaterial.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

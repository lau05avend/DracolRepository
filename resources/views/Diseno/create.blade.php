@extends('partials/nav')

@section('title','Diseno | Registro')

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

    <form enctype="multipart/form-data" action="{{ route('diseno.store') }}" class="form-ob" method="POST">

    @csrf
    <h1>Formulario Diseño</h1>
        <div class="formula">
            <p>
                <label for="ImagenPlano">Imagen Plano:</label>
                <input type="file" name="ImagenPlano" id="ImagenPlano" value="{{ old('ImagenPlano') }}" placeholder="Imagen Plano"><br>
            </p>
            <p>
                <label for="ObservacionDiseno">Observacion Diseno:</label>
                <input type="textarea" name="ObservacionDiseno" id="ObservacionDiseno" value="{{ old('ObservacionDiseno') }}" placeholder="ObservacionDiseno"><br>
            </p>
            <p>
            <label for="IdObra">Obra:</label>
                <select class="inpt" name="obra_id" id="IdObra">
                    <option value="">Seleccione</option>
                @foreach ($IdObra as $IdObra)
                    <option value="{{$IdObra->id}}"> {{$IdObra->NombreObra}} </option>
                @endforeach
                </select>    </p>

        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('diseno.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

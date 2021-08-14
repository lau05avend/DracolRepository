@extends('partials/nav')

@section('title','Actividad | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('clientes.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('clientes.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Clientes</h1>
        <div class="formula">
            <p>
                <label for="NombreCC">Nombre Completo:</label>
                <input type="text" name="NombreCC" id="NombreCC" value="{{ old('NombreCC') }}" placeholder="Nombre"><br>
            </p>
            <p>
                <label for="NumDocU">Num.Documento:</label>
                <input type="number" name="NumIdentificacion" id="NumeroDocumento" value="{{ old('NumIdentificacion') }}" placeholder="Num.Documento"><br>
            </p>
            <p>
                <label for="NumCelular">Num.Celular:</label>
                <input type="number" name="NumCelular" id="NumCelular" value="{{ old('NumCelular') }}" placeholder="Num.Celular"><br>
            </p>
            <p>
                <label for="NumTelefono">Num.Telefono:</label>
                <input type="number" name="NumTelefono" id="NumTelefono" value="{{ old('NumTelefono') }}" placeholder="Num.Telefono"><br>
            </p>
            <p>
                <label for="FotoUsuario">Foto Cliente:</label>
                <input type="file" name="FotoL" id="FotoUsuario" value="{{ old('FotoL') }}" placeholder="FotoUsuario"><br>
            </p>
            <p>
                <label for="CorreoCliente">Correo electronico:</label>
                <input type="text" name="CorreoCliente" id="CorreoCliente" value="{{ old('CorreoCliente') }}" placeholder="Correo electronico"><br>
            </p>
            <p>
            <p>
                <label for="tipo_identificacion">Tipo Identificacion:</label>
                <select class="inpt" name="tipo_identificacion_id" id="tipo_identificacion">
                    <option value="">Seleccione</option>
                @foreach ($tipoi as $ti)
                    <option value="{{$ti->id}}"> {{$ti->TipoIdentificacion}} </option>
                @endforeach
                </select>
            </p>
            <p>
                <label for="tipo_cliente_id">Tipo Cliente:</label>
                <select class="inpt" name="tipo_cliente_id" id="tipo_cliente_id">
                    <option value="">Seleccione</option>
                    @foreach ($tipoc as $tc)
                        <option value="{{$tc->id}}"> {{$tc->nombreTipoC}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="ContrasenaC">Contraseña:</label>
                <input type="password" name="ContrasenaC" id="ContrasenaC" placeholder="contrasena"><br>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('clientes.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

{{--
uwu
--}}

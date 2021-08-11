@extends('partials/nav')

@section('title','Actividad | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('usuarios.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('usuarios.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Usuarios</h1>
        <div class="formula">
            <p>
                <label for="NombreU">Nombre:</label>
                <input type="text" name="NombreUsuario" id="NombreUsuario" value="{{ old('NombreUsuario') }}" placeholder="Nombre"><br>
            </p>
            <p>
                <label for="ApellidoU">Apellido:</label>
                <input type="text" name="ApellidosUsuario" id="ApellidosUsuario" value="{{ old('ApellidosUsuario') }}" placeholder="Apellido"><br>
            </p>
            <p>
                <label for="FotoUsuario">FotoUsuario:</label>
                <input type="file" name="FotoUsuario" id="FotoUsuario" value="{{ old('FotoUsuario') }}" placeholder="FotoUsuario"><br>
            </p>
            <p>
                <label for="NumDocU">Num.Documento:</label>
                <input type="number" name="NumeroDocumento" id="NumeroDocumento" value="{{ old('NumeroDocumento') }}" placeholder="Num.Documento"><br>
            </p>
            <p>
                <label for="NumCel">Num.Celular:</label>
                <input type="number" name="NumeCelular" id="NumeCelular" value="{{ old('NumeCelular') }}" placeholder="Num.Celular"><br>
            </p>
            <p>
                <label for="NumTel">Num.Telefono:</label>
                <input type="number" name="NumTelefono" id="NumTelefono" value="{{ old('NumTelefono') }}" placeholder="Num.Telefono"><br>
            </p>
            <p>
                <label for="fechaNac">Fecha de nacimiento:</label>
                <input type="date" name="FechaNacimientoU" id="FechaNacimientoU" value="{{ old('FechaNacimientoU') }}" placeholder="Nombre"><br>
            </p>
            <p>
                <label for="Correo">Correo electronico:</label>
                <input type="text" name="CorreoUsuario" id="CorreoUsuario" value="{{ old('CorreoUsuario') }}" placeholder="Correo electronico"><br>
            </p>
            <p>
                <label for="GeneroU">Genero:</label>
                <select name="GeneroUsuario" class="inpt" id="GeneroUsuario">
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </p>
            <p>
                <label for="DiereccionU">Dirección de residencia:</label>
                <input type="text" name="DireccionUsuario" id="DireccionUsuario" value="{{ old('DireccionUsuario') }}" placeholder="Dirección"><br>
            </p>
            <p>
                <label for="EdadU">Edad:</label>
                <input type="number" name="EdadU" id="EdadU" value="{{ old('EdadU') }}" placeholder="Edad"><br>
            </p>
            <p>
                <label for="Disponibilidad">Disponibilidad:</label>
                <select name="Disponibilidad" class="inpt" id="Disponibilidad">
                    <option value="">Seleccione</option>
                    <option value="No Disponible">No Disponible</option>
                    <option value="Disponible">Disponible</option>
                    <option value="Ocupado">Ocupado</option>
                </select>
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
                <label for="estado_civil">Estado Civil:</label>
                <select class="inpt" name="estado_civil_id" id="estado_civil">
                    <option value="">Seleccione</option>
                    @foreach ($ec as $ec)
                        <option value="{{$ec->id}}"> {{$ec->EstadoCivil}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="lugar_nacimiento">Lugar Nacimiento:</label>
                <select class="inpt" name="lugar_nacimiento_id" id="lugar_nacimiento">
                    <option value="">Seleccione</option>
                    @foreach ($lugar as $lugar)
                        <option value="{{$lugar->id}}"> {{$lugar->LugarNacimientoU}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="rol">Tipo de Empleado:</label>
                <select class="inpt" name="rol_id" id="rol">
                    <option value="">Seleccione</option>
                    @foreach ($rol as $r)
                        <option value="{{$r->id}}"> {{$r->NombreRol}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="contrasenaU">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" value="{{ old('contrasena') }}" placeholder="contrasena"><br>
            </p>
            <p>
                <label for="conf-contra">Confirmar Contraseña:</label>
                <input type="password" name="confcontrasena" id="conf-contra" value="{{ old('confcontrasena') }}" placeholder="contrasena"><br>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('usuarios.store') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

{{--
uwu
--}}

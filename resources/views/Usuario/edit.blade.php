@extends('partials/nav')

@section('title','Actividad | Editar')

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

    <form enctype="multipart/form-data" action="{{ route('usuarios.update',$usuario) }}" class="form-ob" method="POST">

        @csrf   @method('PATCH')
        <h1>Actualizar Usuario</h1>
        <div class="formula">
            <p>
                <label for="NombreU">Nombre:</label>
                <input type="text" name="NombreUsuario" id="NombreUsuario" value="{{ $usuario->NombreUsuario }}" placeholder="Nombre"><br>
            </p>
            <p>
                <label for="ApellidoU">Apellido:</label>
                <input type="text" name="ApellidosUsuario" id="ApellidosUsuario" value="{{ $usuario->ApellidosUsuario }}" placeholder="Apellido"><br>
            </p>
            <p>
                <label for="FotoUsuario">FotoUsuario:</label>
                <input type="file" name="FotoUsuario" id="FotoUsuario" value="{{ $usuario->FotoUsuario }}" placeholder="FotoUsuario"><br>
            </p>
            <p>
                <label for="NumDocU">Num.Documento:</label>
                <input type="number" name="NumeroDocumento" id="NumeroDocumento" value="{{ $usuario->NumeroDocumento }}" placeholder="Num.Documento"><br>
            </p>
            <p>
                <label for="NumCel">Num.Celular:</label>
                <input type="number" name="NumeCelular" id="NumeCelular" value="{{ $usuario->NumeCelular }}" placeholder="Num.Celular"><br>
            </p>
            <p>
                <label for="NumTel">Num.Telefono:</label>
                <input type="number" name="NumTelefono" id="NumTelefono" value="{{ $usuario->NumTelefono }}" placeholder="Num.Telefono"><br>
            </p>
            <p>
                <label for="fechaNac">Fecha de nacimiento:</label>
                <input type="date" name="FechaNacimientoU" id="FechaNacimientoU" value="{{ $usuario->FechaNacimientoU }}" placeholder="Nombre"><br>
            </p>
            <p>
                <label for="Correo">Correo electronico:</label>
                <input type="text" name="CorreoUsuario" id="CorreoUsuario" value="{{ $usuario->CorreoUsuario }}" placeholder="Correo electronico"><br>
            </p>
            <p>
                <label for="GeneroU">Genero:</label>
                <select name="GeneroUsuario" class="inpt" id="GeneroUsuario">
                    <option value="">Seleccione</option>
                    <option value="Masculino" @if($usuario->GeneroUsuario=='Masculino') selected @endif>Masculino</option>
                    <option value="Femenino" @if($usuario->GeneroUsuario=='Femenino') selected @endif>Femenino</option>
                    <option value="Otro" @if($usuario->GeneroUsuario=='Otro') selected @endif>Otro</option>
                </select>
            </p>
            <p>
                <label for="DiereccionU">Dirección de residencia:</label>
                <input type="text" name="DireccionUsuario" id="DireccionUsuario" value="{{ $usuario->DireccionUsuario }}" placeholder="Dirección"><br>
            </p>
            <p>
                <label for="EdadU">Edad:</label>
                <input type="number" name="EdadU" id="EdadU" value="{{ $usuario->EdadU }}" placeholder="Edad"><br>
            </p>
            <p>
                <label for="Disponibilidad">Disponibilidad:</label>
                <select name="Disponibilidad" class="inpt" id="Disponibilidad">
                    <option value="">Seleccione</option>
                    <option value="No Disponible" @if($usuario->Disponibilidad=='No Disponible') selected @endif>No Disponible</option>
                    <option value="Disponible" @if($usuario->Disponibilidad=='Disponible') selected @endif>Disponible</option>
                    <option value="Ocupado" @if($usuario->Disponibilidad=='Ocupado') selected @endif>Ocupado</option>
                </select>
            </p>
            <p>
            <p>
                <label for="tipo_identificacion">Tipo Identificacion:</label>
                <select class="inpt" name="tipo_identificacion_id" id="tipo_identificacion">
                    <option value="">Seleccione</option>
                @foreach ($tipoi as $ti)
                    <option value="{{$ti->id}}" @if($usuario->tipo_identificacion_id==$ti->id) selected @endif> {{$ti->TipoIdentificacion}} </option>
                @endforeach
                </select>
            </p>
            <p>
                <label for="estado_civil">Estado Civil:</label>
                <select class="inpt" name="estado_civil_id" id="estado_civil">
                    <option value="">Seleccione</option>
                    @foreach ($ec as $ec)
                        <option value="{{$ec->id}}" @if($usuario->estado_civil_id==$ec->id) selected @endif> {{$ec->EstadoCivil}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="lugar_nacimiento">Lugar Nacimiento:</label>
                <select class="inpt" name="lugar_nacimiento_id" id="lugar_nacimiento">
                    <option value="">Seleccione</option>
                    @foreach ($lugar as $lugar)
                        <option value="{{$lugar->id}}" @if($usuario->lugar_nacimiento_id==$lugar->id) selected @endif> {{$lugar->LugarNacimientoU}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="rol">Tipo de Empleado:</label>
                <select class="inpt" name="rol_id" id="rol">
                    <option value="">Seleccione</option>
                    @foreach ($rol as $r)
                        <option value="{{$r->id}}" @if($usuario->rol_id==$r->id) selected @endif> {{$r->NombreRol}} </option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="contrasenaU">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" placeholder="contrasena"><br>
            </p>
            <p>
                <label for="conf-contra">Confirmar Contraseña:</label>
                <input type="password" name="confcontrasena" id="conf-contra" placeholder="contrasena"><br>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('usuarios.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

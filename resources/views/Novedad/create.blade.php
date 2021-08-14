@extends('partials/nav')

@section('title','Actividad | Registro')

@section('content')

<div class="form" id="form">
    <a href="{{ route('novedad.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('novedad.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Novedad</h1>
        <div class="formula">
            <p>
                <label for="AsuntoN">Asunto Novedad:</label>
                <input type="text" name="AsuntoNovedad" id="AsuntoN" value="{{ old('AsuntoNovedad') }}" placeholder="Asunto Novedad"><br>
            </p>
            <p>
                <label for="estad">Estado Novedad:</label>
                <select name="EstadoNovedad" class="inpt" id="estad">
                    <option value="">Seleccione</option>
                    <option value="1">Sin Atender</option>
                    <option value="2">Atendida</option>
                    <option value="3">En espera</option>
                </select>
            </p>

            <p>
                <label for="detac">Descripción Novedad:</label><br>
                <textarea name="DescripcionN" id="detac" cols="85" placeholder="Descripcion" rows="5">{{ old('DescripcionN') }}</textarea>
            </p>
            <p>
                <label for="tnov">Tipo Novedad:</label>
                <select class="inpt" name="tipo_novedad_id" id="tnov">
                    <option value="">Seleccione</option>
                    @forelse ($tn as $cl)
                        <option value="{{ $cl->id }}">{{ $cl->NombreTipoN }}</option>
                    @empty
                        <option value="">Ups! Selecciona alguno para continuar </option>
                    @endforelse
                </select>
            </p>
            <p>
                <label for="Activity">Actividad:</label>
                <select class="inpt" name="actividad_id" id="Activity">
                    <option value="">Seleccione</option>
                    @forelse ($Act as $cl)
                        <option value="{{ $cl->id }}">{{ $cl->NombreActividad }}</option>
                    @empty
                        <option value="">Ups! Selecciona alguno para continuar </option>
                    @endforelse
                </select>
            </p>
            <p>
                <label for="Usu">Usuario:</label>
                <select class="inpt" name="usuario_id" id="Usu">
                    <option value="">Seleccione</option>
                    @forelse ($Usua as $cl)
                        <option value="{{ $cl->id }}">{{ $cl->NombreUsuario }}</option>
                    @empty
                        <option value="">Ups! Selecciona alguno para continuar </option>
                    @endforelse
                </select>
            </p>
            <p>
                <label for="Cl">Cliente:</label>
                <select class="inpt" name="cliente_id" id="Cl">
                    <option value="">Seleccione</option>
                    @forelse ($Client as $cl)
                        <option value="{{ $cl->id }}">{{ $cl->NombreCC }}</option>
                    @empty
                        <option value="">Ups! Selecciona algun cliente para continuar </option>
                    @endforelse
                </select>
            </p>

        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('novedad.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

@extends('partials/nav')

@section('title','Actividad | Editar')

@section('content')

<div class="form" id="form">
    <a href="{{ route('tipoobra.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('tipoobra.update',$tipoobra) }}" class="form-ob" method="POST">

        @csrf   @method('PATCH')
        <h1>Actualizar Tipo de Obra</h1>
        <div class="formula">
            <p>
                <label for="TipoObra">Nombre de Tipo Obra:</label>
                <input type="text" name="TipoObra" id="TipoObra" value="{{ $tipoobra->TipoObra }}" placeholder="Nombre Tipo Obra"><br>
            </p>
            <p>
                <label for="detob">Descripción de Tipo Obra:</label><br>
                <textarea name="DescripcionTO" id="detob" cols="85" rows="3">{{ $tipoobra->DescripcionTO?$tipoobra->DescripcionTO:old('DescripcionTO') }}</textarea>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('tipoobra.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

@extends('partials/nav')

@section('title','Obras')

@section('content')

<div class="form" id="form">
    <a href="{{ route('obra.index') }}" class="btn btn-dark">Volver</a><br><br>

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

    <form enctype="multipart/form-data" action="{{ route('obra.store') }}" class="form-ob" method="POST">

        @csrf
        <h1>Formulario Obra</h1>
        <div class="formula">
            <p>
                <label for="NombreObra">Nombre Obra:</label>
                <input type="text" name="NombreObra" id="NombreObra" value="{{ old('NombreObra') }}" placeholder="Nombre Completo"><br>
            </p>
            <p>
                <label for="dir">Direccion Obra:</label>
                <input type="text" id="dir" name="DireccionObra" value="{{ old('DireccionObra') }}" placeholder="Dirección"><br>
            </p>
            <p>
                <label for="ciud">Ciudad Obra:</label>
                <input type="text" name="CiudadObra" id="ciud" value="{{ old('CiudadObra') }}" placeholder="Ciudad"><br>
            </p>
            <p>
                <label for="area">Medida Área:</label>
                <input type="number" name="MedidaArea" id="area" value="{{ old('MedidaArea') }}" placeholder="Área"><br>
            </p>
            <p>
                <label for="perimet">Medida Perimetro:</label>
                <input type="number" name="MedidaPerimetro" id="perimet" value="{{ old('MedidaPerimetro') }}" placeholder="Perimetro"><br>
            </p>
            <p>
                <label for="desniv">Condicion Desnivel:</label>
                <input type="number" name="CondicionDesnivel" id="desniv" value="{{ old('CondicionDesnivel') }}" placeholder="Condicion Desnivel"><br>
            </p>
            <p>
                <label for="matsu">Tipo de Material Suelo:</label>
                <select name="TipoMaterialSuelo" class="inpt" id="matsu">
                    <option value="">Seleccione</option>
                    <option value="Cemento">Cemento</option>
                    <option value="Asfalto">Asfalto</option>
                </select>
            </p>
            <p>
                <label for="detco">Detalle de Condicion Piso:</label><br>
                <textarea name="DetalleCondicionPiso" id="detco" cols="85" rows="3">{{ old('DetalleCondicionPiso') }}</textarea>
            </p>
            <p>
                <label for="datadic">Datos Adicionales:</label><br>
                <textarea name="DatosAdicionales" id="datadic" cols="85" rows="3">{{ old('DatosAdicionales') }}</textarea>
            </p>
            <p>
                <label for="typeo">Tipo de Obra:</label>
                <select class="inpt" name="tipo_obra_id" id="typeo">
                    <option value="">Seleccione</option>
                    @forelse ($tipo as $ty)
                        <option value="{{ $ty->id }}">{{ $ty->TipoObra }}</option>
                    @empty
                        <option value="">Ups! Registra tipos de obras para continuar</option>
                    @endforelse
                </select>
            </p>
            <p>
                <label for="cli">Cliente:</label>
                <select class="inpt" name="cliente_id" id="cli">
                    <option value="">Seleccione</option>
                    @forelse ($cliente as $cl)
                        <option value="{{ $cl->id }}">{{ $cl->NombreCC }}</option>
                    @empty
                        <option value="">Ups! Registra clientes para continuar</option>
                    @endforelse
                </select>
            </p>
        </div>

        <button class="save">Guardar</button>
    </form>
    <br><br>
    <a href="{{ route('obra.index') }}" class="btn btn-dark buttonN">Volver</a>
</div>

@endsection

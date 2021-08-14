@extends('partials/nav')

@section('title','Actividad')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-acti.css'); }}">
@endsection

@section('content')

    @if (session('success'))
    <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
        <p id="messag">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="form" id="form">
        <a href="{{ route('activity.index') }}" class="btn btn-dark">Volver</a><br><br>
        <div class="form-ob">
            <p class="title">ACTIVIDAD: <strong>{{ $activity->NombreActividad }}</strong> </p>
            <p class="p-d"><strong>Descripcion:</strong>{{ $activity->DescripcionActividad }}</p><br>
            <p><strong>ESTADO ACTIVIDAD: </strong> {{ $activity->EstadoActividad->NombreEstado }}</p>
            <p><strong>FASE ACTIVIDAD: </strong> {{ $activity->FaseTarea->NombreFase }}</p>
            <p><strong>OBRA: </strong> {{ $activity->Obra->NombreObra }}</p>
            <br>
            <p><strong>FECHA DE INICIO: </strong> {{ $activity->FechaInicioA?date('d-m-Y h:i:s A', strtotime($activity->FechaInicioA )):'-' }}</p>
            <p><strong>FECHA DE FIN: </strong> {{ $activity->FechaFinA? date('d-m-Y h:i:s A', strtotime($activity->FechaFinA )):'-' }}</p>
            <div >


                <h2 class="title">Usuarios Asignados</h2><br>
                <ul class="list-disc list-us">
                    @forelse ($users as $u)
                    <li>{{ $u->id.'. '.$u->NombreUsuario.' '.$u->ApellidosUsuario }}: <strong>{{$u->Rol->NombreRol}}</strong></li>
                    @empty
                    <li><strong>NO HAY USUARIOS ASIGNADOS.</strong></li>
                    @endforelse
                </ul>
                <br><br>
            </div>
            <br><br>
        <a href="{{ route('editus',$activity) }}" class="btn btn-dark buttonN">EDITAR</a>
        </div>
        {{-- {{ $users }} --}}

    </div>

@endsection

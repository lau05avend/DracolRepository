@extends('partials/nav')

@section('title','Actividad')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-acti.css'); }}">
@endsection

@section('content')

<div class="form" id="form">
    <a href="{{ route('activity.show',$activity) }}" class="btn btn-dark">Volver</a><br><br>
    <div class="form-ob">
        <p class="title">ACTIVIDAD: <strong>{{ $activity->NombreActividad }}</strong> </p>
        <p class="p-d"><strong>Descripcion:</strong>{{ $activity->DescripcionActividad }}</p>
        <form method="POST" action="{{ route('regUs',$activity) }}">

            @csrf
            <h2 class="title">Asignar Usuarios</h2><br>
            @forelse ($users as $u)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Usuarios[]" value="{{$u->id}}" id="{{ $u->id }}">
                <label class="form-check-label" for="{{ $u->id }}">
                    {{$u->id.' . '.$u->NombreUsuario}}
                </label>
            </div>
            {{-- <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" id="{{ $u->id }}" name="Usuarios[]" value="{{$u->id}}">
                </div>
                <div class="input-group-text" style="width: 6ch !important;">
                    <label for="{{ $u->id }}">{{$u->NombreUsuario}}</label>
                </div>
            </div> --}}
            @empty
            <p>
                NO HAY USUARIOS DISPONIBLES.
            </p>
            @endforelse
            <br><br>
            <button class="save">GUARDAR</button>
        </form>

    </div>

</div>

@endsection

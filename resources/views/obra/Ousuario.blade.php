@extends('partials/nav')

@section('title','Actividad')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-acti.css'); }}">
@endsection

@section('content')

<div class="form" id="form">
    <a href="{{ route('obra.show',$obra) }}" class="btn btn-dark">Volver</a><br><br>
    <div class="form-ob">
        <div class="div-edit">
            <p class="title">OBRA: <strong>{{ $obra->NombreObra }}</strong> </p>
            <p class="p-d"><strong>TIPO OBRA: </strong>{{ $obra->TipoObra->TipoObra  }}</p>
            <p><strong>Dirección: </strong> {{ $obra->DireccionObra}}</p>
            <p><strong>Ciudad: </strong> {{ $obra->CiudadObra}}</p>

            <h2 class="title">Asignar Usuarios</h2><br>
            <form method="POST" class="form-as" action="{{ route('updateUs',$obra) }}">

                @csrf
                @forelse ($users as $u)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="Usuarios[]" value="{{$u->id}}" id="{{ $u->id }}">
                    <label class="form-check-label" for="{{ $u->id }}">
                        {{$u->id.' . '.$u->NombreUsuario}}
                    </label>
                </div>
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

</div>

@endsection

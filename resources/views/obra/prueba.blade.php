@extends('partials/nav')

@section('title','Obras')

@section('content')

    @if(session("mensaje"))
        <h3 style="color: blue;">{{ session("mensaje") }}</h3>
    @endif
    {{ $obrastot }}
    @if($obras)
        <script>
            var obras = @json($obras);
            var obrastot = @json($obrastot);

            console.log(obrastot);
            console.log(obras);
        </script>
    @else
        <p>nada</p>
    @endif

    <!--========== CONTENT ==========-->
    <h1 class="title-o display-1">Obras</h1>
    <div class="cont-estado">
        <div class="butt-status">
            <b class="name">Estado: </b>
            <button class="btn btn-success">Activas</button>
            <button class="btn btn-warning">En proceso</button>
            <button class="btn btn-secondary">Sin Empezar</button>
            <button class="btn btn-dark">Terminadas</button>
            <button class="btn btn-danger">Canceladas</button>
        </div>
        <div class="filter-o">
            <input type="text" class="input-o" placeholder="Filtrar">
            <a href="#"><img src="{{ URL::asset('img/search.png'); }}" alt="search" class="img-search"></a>
        </div>
    </div>
    <div class="cont-o" id="lista">
        <div class="obra-containers" id="lista-left"  data-category="center_column">
            <div  class="div-obras" data-id="1">
                <div class="title-div">
                    <h3>Obra 1</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                    <button class="btn btn-warning">Mas Información</button><br>
                </div>
            </div>
            <div  class="div-obras" data-id="2">
                <div class="title-div">
                    <h3>Obra 2</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                    <button class="btn btn-warning">Mas Información</button><br>
                </div>
            </div>
            <div  class="div-obras" data-id="3">
                <div class="title-div">
                    <h3>Obra 3</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                    <button class="btn btn-warning">Mas Información</button><br>
                </div>
            </div>
            <div  class="div-obras" data-id="4">
                <div class="title-div">
                    <h3>Obra 4</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                    <button class="btn btn-warning">Mas Información</button><br>
                </div>
            </div>
        </div>
        <div class="obra-containers" id="lista-center" data-category="center_column">
            <div  class="div-obras" data-id="5">
                <div class="title-div">
                    <h3>Obra 1</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                </div>
            </div>
            <div  class="div-obras" data-id="6">
                <div class="title-div">
                    <h3>Obra 2</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                </div>
            </div>
        </div>
        <div class="obra-containers" id="lista-right" data-category="right_column">
            <div  class="div-obras" data-id="7">
                <div class="title-div">
                    <h3>Obra 3</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                </div>
            </div>
            <div  class="div-obras" data-id="8">
                <div class="title-div">
                    <h3>Obra 4</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                </div>
            </div>
            <div  class="div-obras" data-id="9">
                <div class="title-div">
                    <h3>Obra 5</h3>
                    <img src="{{ URL::asset('img/drag.png'); }}" alt="drag" class="img-drag">
                </div>
                <div class="content-div">
                    <p><strong>Descripcion:</strong>
                        Descripcion corta de la obra</p>
                    <p>Estado</p>
                </div>
            </div>
        </div>
    </div>
    <dialog open="true" class="dialog">
        <h1>dialog</h1>
    </dialog>
    <div>
        <a href="{{ route('obra.create') }}"><button class="btn btn-dark but-reg">Registrar obra</button></a>
    </div>
@endsection

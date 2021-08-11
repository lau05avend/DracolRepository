<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/shot.png'); }}" />
    <title>Dracol</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles-obra.css'); }}">
    <link rel="stylesheet" href="{{ asset('css/styles-cli.css'); }}">
</head>
<body>
    <!--========== HEADER ==========-->
    <header class="header">
        <div class="header__container">
            <a href="/" class="header__logo">DRACOL S.A</a>
        </div>
    </header>
    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="/" class="nav__link nav__logo">
                    <i class='bx bxs-disc nav__icon'></i>
                    <span class="nav__logo-name">DRACOL</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Perfil</h3>

                        <a href="/" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Inicio</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Perfil</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="#" class="nav__dropdown-item">Yo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>

                        <a href="{{ route('activity.index') }}" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Cronograma</span>
                        </a>
                        <a href="{{ route('usuarios.index') }}" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Empleados</span>
                        </a>
                        <a href="{{ route('clientes.index') }}" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Clientes</span>
                        </a>
                        <a href="{{ route('obra.index') }}" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Obra</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Diseños</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Materiales</span>
                        </a>
                        <a href="{{ route('novedad.index') }}" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Novedades</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Planilla</span>
                        </a>

                    </div>

                    <a href="" class="nav__link nav__logout">
                        <i class='bx bx-log-out nav__icon'></i>
                        <span class="nav__name">Salir</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!--========== CONTENT ==========-->
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    {{-- datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('js/script-obra.js'); }}"></script>

</body>
</html>

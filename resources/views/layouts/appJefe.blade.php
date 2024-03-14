<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Macuin Dashboards') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/jefe/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jefe/showUsers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jefe/showTickets.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-custom shadow-sm">
            <div class="container">
                <a class="navbar-brand" onclick="showSpinners()" href="{{ url('/jefe') }}">
                    <b>{{ config('app.name', 'Macuin Dashboards') }}</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif
    @else
        <!-- Tickets Dropdown -->
        <li class="nav-item dropdown">
            <a id="ticketsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tickets
            </a>
            <div class="dropdown-menu" aria-labelledby="ticketsDropdown">
                <!--<a class="dropdown-item" href="{{ url('/ticketJefe/create') }}">Crear</a>-->
                <a class="dropdown-item" onclick="showSpinners()" href="{{ url('/ticketJefe') }}">Consultar</a>
            </div>
        </li>

        <!-- Usuarios Dropdown -->
        <li class="nav-item dropdown">
            <a id="usersDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{ url('/user/create') }}">{{ __('Crear') }}</a>
                <a class="dropdown-item" onclick="showSpinners()" href="{{ url('/user') }}">Consultar</a>
            </div>
        </li>

        <!-- Administrar Perfil Dropdown -->
        <li class="nav-item dropdown">
            <a id="profileManagementDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administrar perfil
            </a>
            <div class="dropdown-menu" aria-labelledby="profileManagementDropdown">
                <!--<a class="dropdown-item" onclick="showSpinners()" href="{{ url('/perfilJefe') }}">Modificar datos</a>-->
                <a class="dropdown-item" href="{{ route('vistaCambioContraJefe') }}">Cambiar contraseña</a>
            </div>
        </li>

        <!-- Sesion Dropdown -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->Nombre }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); showSpinners();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>

                </div>
            </div>
        </nav>
        @if(session('mensaje'))
            <div class="alert alert-{{ session('mensaje')['tipo'] == 'success' ? 'success' : 'danger' }}">
                {{ session('mensaje')['texto'] }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <div id="spinnerContainer" style="display: none;" class="text-center">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script>
        function showSpinners() {
            document.getElementById('spinnerContainer').style.display = 'block';
        }
    </script>
</body>
</html>
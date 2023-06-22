<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            min-height: 100%;
            position: relative;
        }
        
        footer {
            background-color: #f2d8b7f4e7df;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 55px;
            color: white;
            z-index: 2; /* Establecer el valor del z-index */
            display: flex; /* Utilizar flexbox */
            justify-content: flex-end; /* Alinear elementos al lado derecho */
        }
        .sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            min-height: calc(100vh - 55px);
            z-index: 1; /* Establecer el valor del z-index */
        }
        
        .content {
            padding: 20px;
            position: relative; /* Establecer la posición relativa */
            z-index: 0; /* Establecer el valor del z-index */
        }
        
        .nav-linkn {
            display: block;
            padding: 0.5rem 0.5rem;
            border-top: none;
            border-bottom: none;
            border-left: none;
            border-right: 1px solid black;
            text-decoration: none;
        }
        .nav-links {
            display: block;
            padding: 1rem 1rem;
            border-top: none;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            text-decoration: none;
        }

        .nav-link:hover {
            border-color: #dddddd;
        }

        .nav-link.active {
            background-color: #dddddd;
            border-color: #aaaaaa;
            color: #333333;
}
        
    </style> 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #0d374f;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{('L') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @role("Administradores")
                    <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('grupos.index') }}" style ="color: white;">Grupo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('grados.index') }}" style ="color: white">Grado</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('instituciones.index') }}" style ="color: white">Instituciones Educativas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('temas.index') }}" style ="color: white">Tema</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('encuestas.index') }}" style ="color: white">Encuestas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('preguntas.index') }}" style ="color: white">Preguntas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('repuestas.index') }}" style ="color: white">Respuestas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('ponderaciones.index') }}" style ="color: white">Valores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('cuestionarios.index') }}" style ="color: white">Encuestas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('apoyos.index') }}" style ="color: white">Instituciones de apoyo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-linkn" href="{{ route('recusos.index') }}" style ="color: white">Materiales</a>
                                </li>   
                    </ul>
                    @endrole

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style ="color: white">{{ __('Iniciar sesion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style ="color: white">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style ="color: white" 
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-regular fa-user"></i>
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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

        <div class="container-fluid">
            <div class="row">
                <div class="sidebar" style="background-color: #144b69; width: 250px;">
                    <!-- Contenido del sidebar -->
                    <ul class="nav flex-column">
                    <li class="nav-item">
                         <a class="nav-links" href="{{ route('PTemas') }}" style="color: white"><i class="fa fa-regular fa-calendar"></i> Temas</a>
                        <li class="nav-item">
                            <a class="nav-links" href="{{ route('Papoyos') }}" style="color: white"><i class="fa fa-solid fa-landmark"></i> Instituciones de apoyo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-links" href="{{ route('Precursos') }}" style="color: white"><i class="fa fa-regular fa-folder"></i> Material de apoyo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-links" href="#" style="color: white"><i class="fa fa-regular fa-question"></i> Encuestas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-links" href="#" style="color: white"><i class="fa fa-solid fa-table"></i> Resultados</a>
                        </li>
                        
                        <!-- Agrega más elementos del sidebar si es necesario -->
                    </ul>
                </div> 
                <div class="col-md-9 content">
                    <!-- Contenido principal -->
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <img src="/imagen/flecha.png" style="width: 40px; height: 40px" >
    </footer> 
</body>
</html>

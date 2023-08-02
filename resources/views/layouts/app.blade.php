<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- select2 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="/ruta/a/tu/estilo/select2.min.css" rel="stylesheet">
    <script  cript src="/ruta/a/tu/script/select2.min.js"></script>


    <link href="/ruta/a/tu/estilo/bootstrap.min.css" rel="stylesheet">
    <script src="/ruta/a/tu/script/jquery.min.js"></script>
    <script src="/ruta/a/tu/script/bootstrap.min.js"></script>


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
            
       .menu{
        width: 100%;
        margin-top: 30px;
       }  
       .menu .item{
        psition : relative;
        cursor: pointer;
       }
       .menu .item a{
        color: #f8f9fa;
        font-size: 12px;
        text-decoration: none;
        display: block;
        padding: 5px 30px;
        line-height: 60px;
       }               
       .item i{
        margin-right: 15px;
       }
       .item a .dropdown{
        position: absulete;
        right: 0;
        margin: 20 px;
        transition: 0.03s ease;
       }
       .item .sub-menu{
        background:#1A5276 ;
        display: none;
       }
       .menu-btn{
        position: absulte;
        color: rgb(0,0,0);
        font-size:35px;
        cursor: pointer;
        margin: 25px;
       }
        
    </style> 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #0d374f;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{('Logo') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <<ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"  style="color: white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li><a class="nav-link" style="color: white"  href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link" style="color: white" href="{{ route('roles.index') }}">Manage Role</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
                    
                        <!-- Agrega más elementos del sidebar si es necesario -->

                        <!--Menu Items -->
                        <div class="menu">
                        @role("Admin") 
                            <div class="item"><a class="sub-btn" style="color: white"><i class="fas fa-desktop"></i>DATOS ESCOLARES
                            <!-- dropdown-->
                            <!-- dropdown arrow-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a>
                            <div class="sub-menu">
                                <a href="{{ route('grupos.index') }}" class="sub-item">Grupos</a>
                                <a href="{{ route('grados.index') }}" class="sub-item">Grados</a>
                                <a href="{{ route('instituciones.index') }}" class="sub-item">Escuelas</a>
                            </div>
                            </div>
                            
                            <div class="item"><a class="sub-btn"  style="color: white"><i class="fas fa-desktop"></i>RECURSOS
                            <!-- dropdown-->
                            <!-- dropdown arrow 2-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a> 
                            <div class="sub-menu">
                                <a href="{{ route('temas.index') }}" class="sub-item">Temas</a>
                                <a href="{{ route('apoyos.index') }}" class="sub-item">Instituciones de apoto</a>
                                <a href="{{ route('recusos.index') }}" class="sub-item">Material de aopyo</a>
                            </div>
                            </div>
                            <div class="item"><a class="sub-btn"  style="color: white"><i class="fas fa-desktop"></i>ENCUESTA
                            <!-- dropdown-->
                            <!-- dropdown arrow 3-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a>
                            <div class="sub-menu">
                                <a href="{{ route('encuestas.index') }}" class="sub-item">Encuestas</a>
                                <a href="{{ route('preguntas.index') }}" class="sub-item">Preguntas</a>
                                <a href="{{ route('repuestas.index') }}" class="sub-item">Respuestas</a>
                                <a href="{{ route('cuestionarios.index') }}" class="sub-item">Cuestionarios</a>
                            </div>
                            </div>
                          @endrole 
                            <div class="item"><a  href="{{ route('PTemas') }}"  style="color: white"><i class="fa fa-regular fa-calendar"></i>TEMAS</a> </div>
                            <div class="item"><a href="{{ route('Papoyos') }}"  style="color: white"><i class="fa fa-solid fa-landmark"></i>INSTITUCIONES DE APOYO</a> </div>
                            <div class="item"><a href="{{ route('Precursos') }}"  style="color: white"><i class="fa fa-regular fa-folder"></i>MATERIAL DE APOYO</a> </div>
                            <div class="item"><a href=""  style="color: white"><i class="fa fa-solid fa-table"></i>RESULTADOS</a> </div>



                        </div>

                        
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
                        <script>
                            $(document).ready(function(){
                                // for close button
                                $('.close-btn').click(function(){
                                    $('.menu-btn').css("visibility","visible");
                                })

                            //jquery for toggle sub menus
                            $('.sub-btn').click(function(){
                            $(this).next('.sub-menu').slideToggle();
                            $(this).find('.dropdown').toggleClass('rotate')
                            });
                            })
                            
                        </script>

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

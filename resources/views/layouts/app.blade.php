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

       <!-- paginacion de los usuarios -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



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
        
        
        .sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            min-height: calc(100vh - 55px);
            z-index: 2; /* Establecer el valor del z-index */
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
                <div style="text-align: right;">
                    <img src="/imagen/logo1.png" class="card-img-bottom" style="height: 80px;">
                </div>
                </a>

                <div class="d-flex justify-content-center align-items-center w-100">
                    <!-- Texto centrado -->
                     <span class="navbar-text" style="color: white; font-size: 24px;">
                        PLATAFORMA WEB DE ORIENTACIÓN SOBRE LOS RIESGOS DEL PHISHING
                    </span>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white; font-size: 20px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                           
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white; font-size: 20px;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                        @can('role-list','role-create','role-edit','role-delete')
                            <div class="item"><a  href="{{ route('users.index') }}"  style="color: white; font-size: 20px;"><i class="fa fa-regular fa-user"></i>Usuarios</a> </div>
                            <div class="item"><a  href="{{ route('roles.index') }}"  style="color: white; font-size: 20px;"><i class="fa fa-solid fa-users"></i>Roles</a> </div>
                         
                            <div class="item"><a class="sub-btn" style="color: white; font-size: 20px;"><i class="fa fa-graduation-cap"></i>Aulas
                            <!-- dropdown-->
                            <!-- dropdown arrow-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a>
                            <div class="sub-menu">
                                <a href="{{ route('docentes.index') }}" class="sub-item" style=" font-size: 20px;">Docentes</a>
                                <a href="{{ route('alumnos.index') }}" class="sub-item" style=" font-size: 20px;">Alumnos</a>
                                <a href="{{ route('a-aulas.index') }}" class="sub-item" style=" font-size: 20px;">Asigna Aula</a>
                            </div>
                            </div>

                            <div class="item"><a class="sub-btn" style="color: white; font-size: 20px;"><i class="fa fa-graduation-cap"></i>Datos escolares
                            <!-- dropdown-->
                            <!-- dropdown arrow-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a>
                            <div class="sub-menu">
                                <a href="{{ route('grupos.index') }}" class="sub-item" style=" font-size: 20px;">Grupos</a>
                                <a href="{{ route('grados.index') }}" class="sub-item" style=" font-size: 20px;">Grados</a>
                                <a href="{{ route('instituciones.index') }}" class="sub-item" style=" font-size: 20px;">Escuelas</a>
                            </div>
                            </div>
                            
                            <div class="item"><a class="sub-btn"  style="color: white;font-size: 20px;"><i class="fa fa-folder"></i>Recursos
                            <!-- dropdown-->
                            <!-- dropdown arrow 2-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a> 
                            <div class="sub-menu">
                                <a href="{{ route('temas.index') }}" class="sub-item"style=" font-size: 20px;">Temas</a>
                                <a href="{{ route('apoyos.index') }}" class="sub-item"style=" font-size: 20px;">Instituciones de apoyo</a>
                                <a href="{{ route('recusos.index') }}" class="sub-item"style=" font-size: 20px;">Material de apoyo</a>
                            </div>
                            </div>
                            <div class="item"><a class="sub-btn"  style="color: white;font-size: 20px;"><i class="fa fa-question"></i>Encuestas
                            <!-- dropdown-->
                            <!-- dropdown arrow 3-->
                            <i class="fas fa-angle-right dropdown"></i>
                            </a>
                            <div class="sub-menu">
                                <a href="{{ route('encuestas.index') }}" class="sub-item"style=" font-size: 20px;">Encuestas</a>
                                <a href="{{ route('preguntas.index') }}" class="sub-item"style=" font-size: 20px;">Preguntas</a>
                                <a href="{{ route('repuestas.index') }}" class="sub-item"style=" font-size: 20px;">Respuestas</a>
                                <a href="{{ route('cuestionarios.index') }}" class="sub-item"style=" font-size: 20px;">Cuestionarios</a>
                            </div>
                            </div>
                        @endcan  
                            <div class="item"><a  href="{{ route('PTemas') }}"  style="color: white;font-size: 20px;"><i class="fa fa-regular fa-calendar"></i>Temas</a> </div>
                            <div class="item"><a href="{{ route('Papoyos') }}"  style="color: white;font-size: 20px;"><i class="fa fa-solid fa-landmark"></i>Instituciones de apoyo</a> </div>
                            <div class="item"><a href="{{ route('Precursos') }}"  style="color: white;font-size: 20px;"><i class="fa fa-regular fa-folder"></i>Material de apoyo</a> </div>
                             
                            <div class="item"><a href="{{ route('chart.show') }}"  style="color: white;font-size: 20px;"><i class="fa fa-solid fa-table"></i>Resultados</a> </div>
                           

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
   
</body>
</html>

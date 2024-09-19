@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Apoyo
@endsection

<!-- Estilos personalizados -->
@section('content')
    <style>
        /* Aplica el tamaño de fuente global para todo el contenido */
        body {
            font-size: 16px;
        }
        
        /* Estilos específicos para los botones y la tarjeta */
        .btn-regresar {
            text-decoration: none;
            color: black;
        }

        .card-header h4 {
            font-size: 20px; /* Ajusta el tamaño de la fuente del título */
        }

        /* Opcional: Personalización del botón */
        .btn-submit {
            background-color: #fbcd77;
            color: #fff;
            border: none;
        }
        
        .btn-submit i {
            margin-right: 5px;
        }
    </style>

    <section class="content container-fluid">
        <!-- Botón de regreso -->
        <a href="{{ route('apoyos.index') }}" class="btn-regresar">
            <i class="fa fa-solid fa-arrow-left"></i> Regresar
        </a>

        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')

                <div class="card card-default">
                    <!-- Título de la tarjeta -->
                    <div class="card-header text-center">
                        <h4 class="card-title">{{ __('Agregar una institucion de apoyo') }}</h4>
                    </div>
                    
                    <!-- Cuerpo del formulario -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('apoyos.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('apoyo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

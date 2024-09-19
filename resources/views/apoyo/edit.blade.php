@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Apoyo
@endsection

<!-- Estilos personalizados -->
@section('content')
    <style>
        /* Ajuste de tamaño de fuente para todo el contenido */
        body {
            font-size: 16px;
        }

        /* Estilo para el encabezado de la tarjeta */
        .card-header {
            font-size: 20px;
            font-weight: bold;
        }

        /* Personalización del botón de envío */
        .btn-submit {
            background-color: #fbcd77;
            color: #fff;
            border: none;
        }

        /* Alineación del botón de envío */
        .box-footer {
            display: flex;
            justify-content: flex-end;
        }

        /* Estilo de los errores */
        .invalid-feedback {
            font-size: 16px;
            color: red;
        }
    </style>

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <!-- Encabezado del formulario -->
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar institucion de apoyo') }}</span>
                    </div>
                    <!-- Cuerpo del formulario -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('apoyos.update', $apoyo->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('apoyo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

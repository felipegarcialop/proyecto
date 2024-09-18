@extends('layouts.app')

<style>
    .uppercase-text {
        text-transform: uppercase;
    }
    .description {
        white-space: pre-line; /* Mantiene los saltos de línea del texto */
        font-size: 18px; /* Tamaño de fuente para la descripción */
    }
    .text-justify {
        text-align: justify;
    }
    .custom-title {
        font-size: 32px; /* Tamaño de fuente para el título */
    }
    .button-container a {
        font-size: 14px; /* Tamaño de fuente para los botones */
    }
</style>

@section('content')
    <a href="{{ route('PTemas') }}" style="text-decoration: none; color: black"><i class="fa fa-solid fa-arrow-left"></i> Regresar</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card" style="border:none">
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @elseif(isset($dato))
                            <h1 class="text-center uppercase-text custom-title">{{ $dato->Nombre }}</h1>
                            <p class="description text-justify">{{ $dato->descripcion }}</p>
                            <p>{{ $dato->fecha }}</p>

                            <div class="button-container text-center">
                                <a href="{{ route('Papoyos') }}" class="btn btn-primary btn-sm float-left">Material de Apoyo</a>
                                <a href="{{ url('/cuestionario/' . $dato->id) }}" class="btn btn-danger btn-sm float-right">Encuesta</a>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                Encuesta no existe.
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <!-- zona para imagen -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

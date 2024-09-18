@extends('layouts.app')

@section('content')
<style>
    .custom-title {
        font-size: 2rem; /* Tamaño de fuente para el título de la encuesta */
    }
    .custom-question {
        font-size: 1.5rem; /* Tamaño de fuente para el título de la pregunta */
    }
    .custom-answer {
        font-size: 1rem; /* Tamaño de fuente para las respuestas */
    }
    .custom-button {
        font-size: 1rem; /* Tamaño de fuente para el botón */
    }
</style>

<div class="container">
    @if(session('error'))
        <div class="alert alert-warning">
            <small>{{ session('error') }}</small>
        </div>
    @elseif(isset($encuesta) && $cuestionarios->isNotEmpty())
        <h1 class="text-center mb-4 custom-title">{{ $encuesta->Titulo }}</h1> <!-- Mostrar el título de la encuesta con tamaño de fuente personalizado -->
        <form action="/cuestionario/guardar" class="form" role="form" method="POST">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $id }}">
            <input type="hidden" id="con" name="con" value="{{ $con }}">

            @foreach ($cuestionarios as $preguntaId => $cuestionario)
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="custom-question">{{ $cuestionario->pregunta->pregunta }}</h4> <!-- Título de la pregunta con tamaño de fuente personalizado -->
                    <div class="d-flex flex-row justify-content-between">
                        @foreach ($respuestasPorPregunta[$preguntaId] as $respuesta)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_{{ $cuestionario->pregunta_id }}" value="{{ $respuesta->id }}" required>
                            <label class="form-check-label custom-answer">{{ $respuesta->Respuestas }}</label> <!-- Opciones de respuesta con tamaño de fuente personalizado -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center">
                <button class="btn btn-primary custom-button" type="submit">Guardar</button> <!-- Botón con tamaño de fuente personalizado -->
            </div>
        </form>
    @else
        <div class="alert alert-warning">
            <small>No existe cuestionario para esta encuesta.</small>
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('PTemas') }}" class="btn btn-secondary custom-button">Regresar a Temas</a> <!-- Enlace con tamaño de fuente personalizado -->
    </div>
</div>
@endsection

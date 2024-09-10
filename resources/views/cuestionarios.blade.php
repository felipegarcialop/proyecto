@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('error'))
        <div class="alert alert-warning">
            <small>{{ session('error') }}</small>
        </div>
    @elseif(isset($encuesta) && $cuestionarios->isNotEmpty())
        <h1 class="text-center mb-4">{{ $encuesta->Titulo }}</h1> <!-- Mostrar el título de la encuesta -->
        <form action="/cuestionario/guardar" class="form" role="form" method="POST">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $id }}">
            <input type="hidden" id="con" name="con" value="{{ $con }}">

            @foreach ($cuestionarios as $preguntaId => $cuestionario)
            <div class="card mb-4">
                <div class="card-body">
                    <h4>{{ $cuestionario->pregunta->pregunta }}</h4> <!-- Título de la pregunta -->
                    <div class="d-flex flex-row justify-content-between">
                        @foreach ($respuestasPorPregunta[$preguntaId] as $respuesta)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_{{ $cuestionario->pregunta_id }}" value="{{ $respuesta->id }}" required>
                            <label class="form-check-label">{{ $respuesta->Respuestas }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    @else
        <div class="alert alert-warning">
            <small>No existe cuestionario para esta encuesta.</small>
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('PTemas') }}" class="btn btn-secondary">Regresar a Temas</a>
    </div>
</div>
@endsection

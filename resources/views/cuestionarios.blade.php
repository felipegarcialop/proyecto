@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Cuestionarios</h1>
    <form action="/cuestionario/guardar" class="form" role="form" method="POST">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $id }}">
        <input type="hidden" id="con" name="con" value="{{ $con->con }}">

        @foreach ($cuestionarios as $preguntaId => $cuestionario)
        <div class="card mb-4">
            <div class="card-body">
                <h4>{{ $cuestionario->pregunta->pregunta }}</h4>
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
</div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Cuestionarios</h1>
    <form action="/cuestionario/guardar" class="form" role="form" method="POST">
        @csrf
            <input class="form-control" type="hidden" id="id" name="id" value="{{ $id }}">
            <input class="form-control" type="hidden" id="con" name="con" value="{{ $con->con }}">
                
            @foreach ($cuestionarios as $preguntaId => $cuestionario)
                <h4>{{ $cuestionario->pregunta->pregunta }}</h4>
                @foreach ($respuestasPorPregunta[$preguntaId] as $respuesta)
                    <label>
                        <input type="radio" name="respuesta_{{ $cuestionario->pregunta_id }}" value="{{ $respuesta->id }}" required>
                        {{ $respuesta->Respuestas }}
                    </label><br>
                @endforeach
            @endforeach
        <button class="primary" type="submit">
            Guardar 
        </button>  
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>{{ $encuesta->titulo }}</h1>

    <h2>Cuestionarios</h2>
    @if ($cuestionarios->isEmpty())
        <p>No hay cuestionarios disponibles.</p>
    @else
        <ul>
            @foreach ($cuestionarios as $cuestionario)
                <li>
                    <p>Pregunta: {{ $cuestionario->pregunta->pregunta }}</p>
                    <p>Respuesta: {{ $cuestionario->respuesta }}</p>
                    <p>Ponderación: {{ $cuestionario->ponderacion->ponderacion }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

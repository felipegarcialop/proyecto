@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Flecha de regreso -->
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>

    <h2>Puntajes y Promedios Ajustados para el Alumno: {{ $user->name }}</h2>

    

    @foreach ($dataByEncuesta as $titulo => $encuestaData)
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ $titulo }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Total de Preguntas:</strong> {{ $encuestaData['totalQuestions'] }}</p>
                <p><strong>Puntuación Total:</strong> {{ $encuestaData['totalScore'] }}</p>
                <p><strong>Promedio Ajustado:</strong> {{ number_format($encuestaData['adjustedAverage'], 2) }}%</p>

                <!-- Mostrar los datos -->
                @if($encuestaData['data']->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pregunta</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($encuestaData['data'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->pregunta }}</td>
                                    <td>{{ $item->Valor }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning">
                        El alumno no ha realizado ningún cuestionario.
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>

@endsection

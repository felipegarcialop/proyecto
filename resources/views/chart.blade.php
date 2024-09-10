@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Gráficos por Encuesta</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body, html {
            height: 100%;
        }
        .center-title {
            text-align: center;
        }
        .card-details {
            margin-top: 10px;
        }
        .total-score {
            font-weight: bold;
        }
        .adjusted-average {
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach($dataByEncuesta as $encuestaTitulo => $encuestaData)
            <div class="card mb-4">
                <div class="card-header center-title">
                    <h2 class="card-title">{{ $encuestaTitulo }}</h2>
                </div>
                <div class="card-details">
                    <p class="total-score">Puntuación Total: {{ $encuestaData['totalScore'] }}</p>
                    <p class="adjusted-average">Promedio Ajustado: {{ number_format($encuestaData['adjustedAverage'], 2) }}%</p>
                    <p>Total de Preguntas: {{ $encuestaData['totalQuestions'] }}</p> <!-- Mostrar total de preguntas -->
                </div>
                <div class="card-body">
                    <canvas id="myChart{{ str_replace(' ', '_', $encuestaTitulo) }}" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart{{ str_replace(' ', '_', $encuestaTitulo) }}').getContext('2d');
                        var data{{ str_replace(' ', '_', $encuestaTitulo) }} = @json($encuestaData['data']);

                        var labels{{ str_replace(' ', '_', $encuestaTitulo) }} = data{{ str_replace(' ', '_', $encuestaTitulo) }}.map(item => 'Pregunta ' + item.question_number); // Etiquetas con el número de pregunta
                        var values{{ str_replace(' ', '_', $encuestaTitulo) }} = data{{ str_replace(' ', '_', $encuestaTitulo) }}.map(item => item.Valor);

                        var chart{{ str_replace(' ', '_', $encuestaTitulo) }} = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels{{ str_replace(' ', '_', $encuestaTitulo) }},
                                datasets: [{
                                    label: 'Valores',
                                    data: values{{ str_replace(' ', '_', $encuestaTitulo) }},
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 100,
                                        position: 'right'
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>

@endsection

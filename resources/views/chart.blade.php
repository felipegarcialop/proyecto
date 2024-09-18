@extends('layouts.app')

@section('content')
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
    .chart-container {
        width: 300px; /* Ajusta el ancho del contenedor de la gráfica */
        height: 300px; /* Ajusta la altura del contenedor de la gráfica */
        margin: 0 auto; /* Centra el contenedor de la gráfica */
    }
</style>

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
                <div class="chart-container">
                    <canvas id="myChart{{ str_replace(' ', '_', $encuestaTitulo) }}" width="300" height="300"></canvas>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($dataByEncuesta as $encuestaTitulo => $encuestaData)
            var ctx{{ str_replace(' ', '_', $encuestaTitulo) }} = document.getElementById('myChart{{ str_replace(' ', '_', $encuestaTitulo) }}').getContext('2d');
            var data{{ str_replace(' ', '_', $encuestaTitulo) }} = @json($encuestaData['data']);

            var labels{{ str_replace(' ', '_', $encuestaTitulo) }} = data{{ str_replace(' ', '_', $encuestaTitulo) }}.map(item => 'Pregunta ' + item.question_number);
            var values{{ str_replace(' ', '_', $encuestaTitulo) }} = data{{ str_replace(' ', '_', $encuestaTitulo) }}.map(item => item.Valor);

            new Chart(ctx{{ str_replace(' ', '_', $encuestaTitulo) }}, {
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
                    responsive: true,
                    maintainAspectRatio: false, // Permite que el tamaño sea ajustable
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            position: 'right'
                        }
                    }
                }
            });
        @endforeach
    });
</script>
@endsection

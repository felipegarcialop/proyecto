@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Gráficos por Encuesta</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Añadir enlaces a archivos de Bootstrap si estás utilizando Bootstrap -->
    <!-- Ejemplo: <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
        /* Agrega estilos personalizados si es necesario */
        body, html {
            height: 100%;
        }
        .center-title {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach($dataByEncuesta as $encuestaTitulo => $data)
            <div class="card mb-4">
                <div class="card-header center-title">
                    <h2 class="card-title">{{ $encuestaTitulo }}</h2>
                </div>
                <div class="card-body">
                    <canvas id="myChart{{ str_replace(' ', '_', $encuestaTitulo) }}" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart{{ str_replace(' ', '_', $encuestaTitulo) }}').getContext('2d');
                        var data{{ str_replace(' ', '_', $encuestaTitulo) }} = @json($data);

                        var labels{{ str_replace(' ', '_', $encuestaTitulo) }} = data{{ str_replace(' ', '_', $encuestaTitulo) }}.map(item => item.Pregunta);
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
                                        max: 100, // Establecer límite en el eje Y si es necesario
                                        position: 'right' // Colocar los valores en el lado derecho
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
@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Flecha de regreso -->
    <a href="{{ route('seguimiento.index') }}" class="btn btn-primary mb-3 font-size-16">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>

    <!-- Título Principal y Nombre del Docente -->
    <h1 class="font-size-16">Grado: {{ $docente->user->grado->descripcion }} - Grupo: {{ $docente->user->grado->grupo->descripcion }}</h1>
    <h2 class="font-size-16">Docente: {{ $docente->user->name }}</h2>

    <!-- Tabla de Alumnos -->
    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="font-size-16">Nombre del Alumno</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alumnos as $alumno)
                    <tr class="{{ $loop->even ? 'even-row' : 'odd-row' }}">
                        <td class="selectable font-size-16" data-url="{{ route('seguimiento.puntajes', $alumno->user_id) }}">{{ $alumno->user->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="font-size-16">No hay alumnos en el mismo grado y grupo.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .font-size-16 {
        font-size: 16px;
    }

    .table-container {
        width: 50%; /* Ancho de la tabla al 50% del contenedor */
        margin: 0 auto; /* Centra la tabla horizontalmente */
    }

    .table {
        background-color: #007bff; /* Fondo azul sólido para la tabla */
        color: #ffffff; /* Texto blanco */
        border-collapse: collapse;
        width: 100%; /* Asegura que la tabla ocupe el 100% del contenedor */
        margin-top: 20px;
    }

    .table th {
        background-color: #5bc0de; /* Azul suave para el título */
        color: #000000; /* Texto blanco */
        padding: 12px;
        text-align: left;
    }

    .table td {
        padding: 12px;
        color: #000000; /* Texto blanco para los nombres */
        background-color: #d7f9f8; /* Azul suave para el título */
    }

    .table .even-row {
        background-color: rgba(173, 216, 230, 0.8); /* Azul suave con 80% de transparencia */
    }

    .table .odd-row {
        background-color: rgba(255, 255, 255, 0.8); /* Blanco con 80% de transparencia */
    }

    .selectable {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .selectable:hover {
        background-color: #0056b3; /* Azul oscuro al pasar el puntero */
        color: #ffffff; /* Texto blanco al pasar el puntero */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.selectable').forEach(function(cell) {
            cell.addEventListener('click', function() {
                window.location.href = cell.getAttribute('data-url');
            });
        });
    });
</script>

@endsection

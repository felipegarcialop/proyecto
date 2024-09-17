@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Flecha de regreso -->
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>

    <h1>Alumnos del Docente: {{ $docente->user->name }}</h1>

    <h2>Alumnos en el mismo Grado y Grupo:</h2>

    <ul>
        @forelse ($alumnos as $alumno)
            <li>{{ $alumno->user->name }}</li>
        @empty
            <li>No hay alumnos en el mismo grado y grupo.</li>
        @endforelse
    </ul>
</div>

@endsection

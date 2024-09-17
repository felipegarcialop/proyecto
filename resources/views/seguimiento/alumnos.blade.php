@extends('layouts.app')

@section('content')
<div class="container">
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

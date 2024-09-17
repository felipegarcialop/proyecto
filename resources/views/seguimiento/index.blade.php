<!-- resources/views/seguimiento/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seguimiento de Docentes</h2>
    
    <table class="table">
    <thead>
        <tr>
            <th>Nombre del Docente</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($docentes as $docente)
            <tr>
                <td>{{ $docente->user->name }}</td>
                <td>{{ $docente->user->grado->descripcion }}</td>
                <td>{{ $docente->user->grado->grupo->descripcion }}</td>
                <td>
                    <!-- Botón que redirige a la vista con los alumnos del grado y grupo del docente -->
                    <a href="{{ route('docentes.detalle', $docente->id) }}" class="btn btn-info">Ver Alumnos</a>
                    </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection

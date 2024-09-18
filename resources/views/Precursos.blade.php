@extends('layouts.app')

@section('content')
<style>
    /* Estilos para el contenedor de la vista */
    .view-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Distribuye los elementos de forma equitativa */
        align-items: flex-start; /* Alinea los elementos en la parte superior */
        padding: 20px; /* Agrega espacio entre los elementos */
    }

    /* Estilos para los cards */
    .view-card {
        flex-basis: calc(33.33% - 20px); /* Calcula el ancho de cada card en base al número de elementos por fila */
        margin-bottom: 20px; /* Agrega margen inferior a los cards */
    }

    /* Estilos para los botones */
    .view-btn {
        width: 100px;
        padding: 10px 0; /* Aumenta el padding para que el botón sea más grande */
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        font-size: 18px; /* Tamaño de letra del botón */
        text-align: center; /* Alinea el texto al centro del botón */
        display: inline-block; /* Asegura que el tamaño del botón se ajuste al texto y padding */
    }

    .btn-color-1 {background-color: #a5e1e9;}
    .btn-color-2 {background-color: #d5edb9;}
    .btn-color-3 {background-color: #c4bdf3;}
    .btn-color-4 {background-color: #fbe8a4;}
    .btn-color-5 {background-color: #ffc296;}
    .btn-color-6 {background-color: #f9cadc;}

    .view-btn:hover {
        opacity: 0.8;
    }
</style>

<div class="container text-center">
    <div class="row">
        <h1 class="text-center mb-4">Material de Apoyo</h1>

        @foreach ($datos as $index => $dato)
            @php
            $colorClass = 'btn-color-' . (($index % 6) + 1);
            @endphp
            <div class="view-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $dato->nombre }}</h3>
                        <a href="{{ route('Irecursos', $dato->id) }}" class="btn {{ $colorClass }} view-btn rounded-pill">Ver</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @role("Admin")
    <div class="view-card">
        <div class="card" style="border:none">
            <div class="card-body">
                <button class="btn">
                    <a href="{{ route('recusos.create') }}" class="btn btn-secondary btn-sm float-right" data-placement="left">
                        <i class="fa fa-regular fa-plus"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
    @endrole
</div>

@endsection

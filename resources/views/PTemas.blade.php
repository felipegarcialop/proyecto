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
        padding: 5px 0;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
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
    <h1 class="text-center mb-4" >Temas disponibles</h1>
    <div class="view-container">
        @foreach ($datos as $index => $dato)
            @php
            $colorClass = 'btn-color-' . (($index % 6) + 1);
            @endphp
            <div class="view-card">
                <div class="card" >
                    <div class="card-body">
                        <h3 class="card-title">{{ $dato->Nombre }}</h3>
                        <a href="{{ route('Itemas', $dato->id) }}" style="color: black"
                        class="btn btn {{ $colorClass }} view-btn rounded-pill">Ver </a>
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
                        <a href="{{ route('temas.create') }}" class="btn btn-secondary btn-sm float-right" data-placement="left">
                            <i class="fa fa-regular fa-plus"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>
        @endrole
</div>

@endsection

@extends('layouts.app')

<style>
    .uppercase-text {
        text-transform: uppercase;
    }
    .custom-title {
        font-size: 32px; /* Tamaño de fuente para el título en píxeles */
    }
    .custom-text {
        font-size: 18px; /* Tamaño de fuente para el texto en píxeles */
    }
</style>

@section('content')
<a href="{{ route('Precursos') }}" style="text-decoration: none; color: black"><i class="fa fa-solid fa-arrow-left"></i> Regresar</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card" style="border:none">
                    <div class="card-body">
                        <h1 class="text-center uppercase-text custom-title">{{ $dato->nombre }}</h1>
                    </div>
                    <div class="card-body">
                        <p class="custom-text">{{ $dato->objetivo }}</p>
                        <p class="custom-text">{{ $dato->descripcion }}</p>
                    </div>
                    <div class="card-body">
                        <!--zona para imagen-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

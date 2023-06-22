@extends('layouts.app')
<style>
    .uppercase-text {
        text-transform: uppercase;
    }
</style>
@section('content')
<a href="{{ route('Papoyos') }}" style="text-decoration: none; color: black"><i class="fa fa-solid fa-arrow-left"></i> Regresar</a>
    <div class= "container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card" style="border:none">
                    <div class="card-body">
                        <h1 class="text-center uppercase-text">{{ $dato->nombre }}</h1>
                    </div>
                    <div class= "card-body">
                        <p>{{ $dato-> descripcion}}</p>
                        <p>{{ $dato-> direccion}}</p>
                        <p>{{ $dato->telefono }}</p>
                        <p>{{ $dato-> correo}}</p>
                    </div>
                    <div class= "card-body">
                        <!--zona para imagen-->
                </div>
            </div>
        </div>
    </div>
@endsection
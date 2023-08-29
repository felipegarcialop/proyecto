@extends('layouts.app')
<style>
    .uppercase-text {
        text-transform: uppercase;
    }
</style>
@section('content')
<a href="{{ route('PTemas') }}" style="text-decoration: none; color: black"><i class="fa fa-solid fa-arrow-left"></i> Regresar</a>
    <div class= "container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card" style="border:none">
                    <div class="card-body">
                        <h1 class="text-center uppercase-text">{{ $dato->Nombre }}</h1>
                    </div>
                    <div class= "card-body">
                        <p>{{ $dato-> descripcion}}</p>
                        <p>{{ $dato-> Fecha}}</p>
                        
                    </div>

                     <button class="btn">
                        <a href='/cuestionario/{{$dato->id}}' class="btn btn-secondary btn-sm float-right"  
                        data-placement="left">Ensuesta
                        </a>
                    </button>
                    <div class= "card-body">
                        <!--zona para imagen-->
                </div>
            </div>
        </div>
    </div>
@endsection